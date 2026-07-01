@php
    $documentGroups = $item->project?->documentGroups
        ?->map(function ($group) {
            $documents = $group->documents
                ->map(function ($document) {
                    $attachment = $document->attachments
                        ->first(fn ($attach) => filled($attach->url()));

                    $document->setRelation('visibleAttachment', $attachment);

                    return $document;
                })
                ->filter(fn ($document) => filled($document->visibleAttachment?->url()))
                ->values();

            $group->setRelation('visibleDocuments', $documents);

            return $group;
        })
        ->filter(fn ($group) => $group->visibleDocuments->isNotEmpty())
        ->values() ?? collect();
@endphp

@if($documentGroups->isNotEmpty())
    <section class="project-documents details-group section">
        <div class="container">
            <h3 class="title">Документы проекта</h3>

            <div class="project-documents__list">
                @foreach($documentGroups as $group)
                    <details class="details project-documents__group">
                        <summary class="details__summary project-documents__summary">
                            <span class="project-documents__summary-title">{{ $group->title }}</span>
                            <span class="project-documents__count">{{ $group->visibleDocuments->count() }}</span>
                        </summary>
                        <div class="details__content project-documents__content">
                            <div class="project-documents__items">
                                @foreach($group->visibleDocuments as $document)
                                    <article class="project-documents__item">
                                        <img class="project-documents__icon"
                                             src="/assets/img/icons/document.svg"
                                             alt=""
                                             aria-hidden="true">
                                        <div class="project-documents__body">
                                            <h4 class="project-documents__name">{{ $document->title }}</h4>
                                            @if($document->document_date)
                                                <p class="project-documents__date">
                                                    от {{ $document->document_date->format('d.m.Y') }}
                                                </p>
                                            @endif
                                            <a class="project-documents__download"
                                               href="{{ $document->visibleAttachment->url() }}"
                                               target="_blank"
                                               rel="noopener">
                                                Скачать
                                            </a>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
@endif
