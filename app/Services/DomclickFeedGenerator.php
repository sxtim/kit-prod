<?php

namespace App\Services;

use App\Models\House;
use App\Models\Jk;
use SimpleXMLElement;

class DomclickFeedGenerator
{
    /**
     * Generate XML feed for DomClick using only existing fields.
     */
    public function generate(): string
    {
        $complexes = Jk::query()
            ->where('active', 1)
            ->with(['houses' => function ($query) {
                $query->where('active', 1);
            }])
            ->get();

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><complexes/>');

        foreach ($complexes as $complex) {
            /** @var Jk $complex */
            if ($complex->houses->isEmpty()) {
                continue;
            }

            $complexNode = $xml->addChild('complex');

            $this->addChildIfNotEmpty($complexNode, 'name', (string) $complex->title);
            $this->addChildIfNotEmpty($complexNode, 'address', (string) $complex->address);

            $buildingsNode = $complexNode->addChild('buildings');
            $buildingNode = $buildingsNode->addChild('building');

            // Пока считаем один корпус на ЖК и используем данные ЖК.
            $this->addChildIfNotEmpty($buildingNode, 'name', (string) $complex->title);
            $this->addChildIfNotEmpty($buildingNode, 'address', (string) $complex->address);

            $flatsNode = $buildingNode->addChild('flats');

            /** @var House $flat */
            foreach ($complex->houses as $flat) {
                $flatNode = $flatsNode->addChild('flat');

                $this->addChildIfNotEmpty($flatNode, 'flat_id', (string) $flat->id);
                $this->addChildIfNotEmpty($flatNode, 'apartment', (string) $flat->number);
                $this->addChildIfNotEmpty($flatNode, 'floor', (string) $flat->floor);
                $this->addChildIfNotEmpty($flatNode, 'room', (string) $flat->rooms);

                $price = $flat->base_price;
                $this->addChildIfNotEmpty($flatNode, 'price', $price !== null ? (string) $price : '');

                $this->addChildIfNotEmpty($flatNode, 'area', (string) $flat->square);
                $this->addChildIfNotEmpty($flatNode, 'living_area', (string) $flat->houseroom);
                $this->addChildIfNotEmpty($flatNode, 'kitchen_area', (string) $flat->square_kitchen);

                if ($flat->layout_img) {
                    $plansNode = $flatNode->addChild('plans');
                    $plansNode->addChild('plan', (string) $flat->layout_img);
                }

                $this->addChildIfNotEmpty($flatNode, 'window_view', (string) $flat->view_window);
                $this->addChildIfNotEmpty($flatNode, 'ceiling_height', (string) $flat->ceiling_height);
            }
        }

        // Приводим XML к форматированному виду (отступы, переводы строк) для удобства чтения.
        $dom = dom_import_simplexml($xml)->ownerDocument;
        $dom->formatOutput = true;

        return $dom->saveXML() ?: '';
    }

    protected function addChildIfNotEmpty(SimpleXMLElement $element, string $name, string $value): void
    {
        if ($value === '') {
            return;
        }

        $element->addChild($name, $value);
    }
}
