<?php

namespace App\Services;

use App\Models\House;
use App\Models\Jk;
use Illuminate\Database\Eloquent\Collection;
use SimpleXMLElement;

class CityCenterFeedGenerator
{
    /**
     * Generate XML feed for City Center using active apartments only.
     */
    public function generate(): string
    {
        $buildings = Jk::query()
            ->where('active', 1)
            // Temporary City Center feed exclusion: remove this clause to return the building.
            ->where('address', '!=', 'Летчика Филипова д.4/1')
            ->with(['houses' => function ($query) {
                $query->where('active', 1)
                    ->orderByRaw('CAST(floor AS UNSIGNED)')
                    ->orderByRaw('CAST(number AS UNSIGNED)');
            }])
            ->orderBy('title')
            ->orderBy('address')
            ->get()
            ->filter(static fn (Jk $building) => $building->houses->isNotEmpty())
            ->groupBy(static fn (Jk $building) => trim((string) $building->title));

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><complexes/>');

        foreach ($buildings as $complexName => $complexBuildings) {
            /** @var Collection<int, Jk> $complexBuildings */
            if ($complexName === '') {
                continue;
            }

            $complexNode = $xml->addChild('complex');
            $this->addChildIfNotEmpty($complexNode, 'complex_id', (string) $complexBuildings->min('id'));
            $this->addChildIfNotEmpty($complexNode, 'name', $complexName);

            $buildingsNode = $complexNode->addChild('buildings');

            foreach ($complexBuildings as $building) {
                /** @var Jk $building */
                $buildingNode = $buildingsNode->addChild('building');

                $this->addChildIfNotEmpty($buildingNode, 'building_id', (string) $building->id);
                $this->addChildIfNotEmpty($buildingNode, 'name', (string) $building->title);
                $this->addChildIfNotEmpty($buildingNode, 'address', (string) $building->address);

                $flatsNode = $buildingNode->addChild('flats');

                foreach ($building->houses as $flat) {
                    /** @var House $flat */
                    $this->addFlat($flatsNode, $flat);
                }
            }
        }

        $dom = dom_import_simplexml($xml)->ownerDocument;
        $dom->formatOutput = true;

        return $dom->saveXML() ?: '';
    }

    protected function addFlat(SimpleXMLElement $flatsNode, House $flat): void
    {
        $flatNode = $flatsNode->addChild('flat');

        $this->addChildIfNotEmpty($flatNode, 'flat_id', (string) $flat->id);
        $this->addChildIfNotEmpty($flatNode, 'apartment', (string) $flat->number);
        $this->addChildIfNotEmpty($flatNode, 'floor', (string) $flat->floor);
        $this->addChildIfNotEmpty($flatNode, 'room', (string) $flat->rooms);

        $price = $flat->sale_price ?: $flat->base_price;
        $this->addChildIfNotEmpty($flatNode, 'price', $price !== null ? (string) $price : '');

        $this->addChildIfNotEmpty($flatNode, 'area', (string) $flat->square);
        $this->addChildIfNotEmpty($flatNode, 'living_area', (string) $flat->houseroom);
        $this->addChildIfNotEmpty($flatNode, 'kitchen_area', (string) $flat->square_kitchen);

        $this->addImages($flatNode, $flat);

        $this->addChildIfNotEmpty($flatNode, 'window_view', (string) $flat->view_window);
        $this->addChildIfNotEmpty($flatNode, 'ceiling_height', (string) $flat->ceiling_height);
        $this->addChildIfNotEmpty($flatNode, 'handover', (string) $flat->time);
    }

    protected function addImages(SimpleXMLElement $flatNode, House $flat): void
    {
        if (!$flat->layout_img && !$flat->floor_img && !$flat->gen_plan_img && !$flat->size_img) {
            return;
        }

        $plansNode = $flatNode->addChild('plans');

        $this->addChildIfNotEmpty($plansNode, 'plan', (string) $flat->layout_img);
        $this->addChildIfNotEmpty($plansNode, 'floor_plan', (string) $flat->floor_img);
        $this->addChildIfNotEmpty($plansNode, 'gen_plan', (string) $flat->gen_plan_img);
        $this->addChildIfNotEmpty($plansNode, 'size_plan', (string) $flat->size_img);
    }

    protected function addChildIfNotEmpty(SimpleXMLElement $element, string $name, string $value): void
    {
        if ($value === '') {
            return;
        }

        $element->addChild($name, htmlspecialchars($value, ENT_XML1 | ENT_COMPAT, 'UTF-8'));
    }
}
