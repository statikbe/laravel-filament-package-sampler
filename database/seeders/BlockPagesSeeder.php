<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\TranslatablePage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\CallToActionBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\CardsBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\HtmlBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\ImageBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\OverviewBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\QuoteBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TemplateBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TextBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TextImageBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\VideoBlock;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\BlockIdField;

class BlockPagesSeeder extends Seeder
{

    protected $pages =  [
        'ALL_BLOCKS_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'All blocks',
                    'nl' => 'Alle blokken',
                ],
                'intro' => [
                    'en' => "This page contains an example of all blocks.",
                    'nl' => "Deze pagina bevat een voorbeeld van alle blokken.",
                ],
                'slug' => [
                    'en' => 'all-blocks-page',
                    'nl' => 'alle-blokken-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'text',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ], [
                    'block_type' => 'text-image',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ], [
                    'block_type' => 'image',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ], [
                    'block_type' => 'cards',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ], [
                    'block_type' => 'video',
                ], [
                    'block_type' => 'html',
                ], [
                    'block_type' => 'quote',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ], [
                    'block_type' => 'call-to-action',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ],
            ],
        ],
        'TEXT_BLOCK_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Text block',
                    'nl' => 'Tekstblok',
                ],
                'intro' => [
                    'en' => "A basic block with title and text.",
                    'nl' => 'Een eenvoudig blok met titel en tekst.',
                ],
                'slug' => [
                    'en' => 'text-block-page',
                    'nl' => 'tekstblok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'text',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ]
        ],
        'TEXT_IMAGE_BLOCK_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Text-image block',
                    'nl' => 'Tekst-afbeeldingblok',
                ],
                'intro' => [
                    'en' => "A basic block with title, image and text.",
                    'nl' => 'Een eenvoudig blok met titel, afbeelding en tekst.',
                ],
                'slug' => [
                    'en' => 'text-image-block-page',
                    'nl' => 'tekst-afbeelding-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'text-image',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ],
        ],
        'IMAGE_BLOCK_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Image block',
                    'nl' => 'Afbeeldingblok',
                ],
                'intro' => [
                    'en' => "A basic block with title and image.",
                    'nl' => 'Een eenvoudig blok met titel en afbeelding',
                ],
                'slug' => [
                    'en' => 'image-block-page',
                    'nl' => 'afbeelding-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'image',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ],
        ],
        'CARDS_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Cards block',
                    'nl' => 'Kaartenblok',
                ],
                'intro' => [
                    'en' => "This block is comparable to the overview block, however you can add the title, description, image and CTA for each card. The image conversion, background colour and grid columns can be configured.",
                    'nl' => 'Dit blok is vergelijkbaar met het overzichtsblok, maar je kan de titel, beschrijving, afbeelding en call to action instellen voor iedere kaart afzonderlijk. De afbeeldingsconversie, achtergrondkleur en rasterkolommen kunnen ook ingesteld worden.',
                ],
                'slug' => [
                    'en' => 'cards-block-page',
                    'nl' => 'kaarten-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'cards',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ],
        ],
        'VIDEO_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Video block',
                    'nl' => 'Videoblok',
                ],
                'intro' => [
                    'en' => "You can embed videos from numerous media services and set an overlay image that will cause the video embed to be lazy loaded after clicking the image.",
                    'nl' => "Je kan video's van meerdere media services embedden en een overlay afbeelding instellen die ervoor zorgt dat de video pas geladen wordt nadat de afbeelding aangeklikt wordt.",
                ],
                'slug' => [
                    'en' => 'video-block-page',
                    'nl' => 'video-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'video',
                ]
            ],
        ],
        'HTML_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'HTML block',
                    'nl' => 'HTML-blok',
                ],
                'intro' => [
                    'en' => "A block to insert custom HTML.",
                    'nl' => "Een block waarin je je eigen HTML kan plaatsen.",
                ],
                'slug' => [
                    'en' => 'html-block-page',
                    'nl' => 'html-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'html',
                ]
            ],
        ],
        'QUOTE_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Quote block',
                    'nl' => 'Citeerblok',
                ],
                'intro' => [
                    'en' => "A block to show a quote and it's author.",
                    'nl' => "Een blok met een citaat en auteur.",
                ],
                'slug' => [
                    'en' => 'quote-block-page',
                    'nl' => 'citaat-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'quote',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ],
        ],
        'CALL_TO_ACTION_PAGE' => [
            'content' => [
                'title' => [
                    'en' => 'Call to action block',
                    'nl' => 'Call to action blok',
                ],
                'intro' => [
                    'en' => "This block focuses on adding call-to-actions with image and text.",
                    'nl' => "In dit block kan je een call-to-action element toevoegen met een afbeelding en tekst.",
                ],
                'slug' => [
                    'en' => 'call-to-action-block-page',
                    'nl' => 'call-to-action-blok-pagina',
                ],
            ],
            'blocks' => [
                [
                    'block_type' => 'call-to-action',
                    'block_style' => 'default',
                    'background_colour' => 'primary'
                ]
            ],
        ],
        // 'OVERVIEW_PAGE' => [
        //     'content' => [
        //         'title' => [
        //             'en' => 'Overview block',
        //             'nl' => 'Overzichtsblok',
        //         ],
        //         'intro' => [
        //             'en' => "This block can be used to display the overview fields and image of other model records, e.g. for displaying related blog posts. One can configure the grid columns and background colour.",
        //             'nl' => "Met dit blok kan je de overzichtsvelden en -afbeelding van andere modeltypes weergeven, bvb. bij verwante blog posts. Je kan de grid kolommen en achtergrondkleur configureren.",
        //         ],
        //         'slug' => [
        //             'en' => 'overview-block-page',
        //             'nl' => 'overview-blok-pagina',
        //         ],
        //     ],
        //     'blocks' => [
        //         [
        //             'block_type' => 'overview',
        //         ]
        //     ],
        // ],
        // 'TEMPLATE_PAGE' => [
        //     'content' => [
        //         'title' => [
        //             'en' => 'Template block',
        //             'nl' => 'Templateblok',
        //         ],
        //         'intro' => [
        //             'en' => "You can select Blade templates that you want to include. This can be handy to add small forms or interactive components, e.g. a newsletter signup form or a map.",
        //             'nl' => "Je kan Blade templates selecteren die je wil invoegen. Dit kan handig zijn om kleine formulieren of interactieve elementen toe te voegen, bvb. een inschrijfformulier voor een nieuwsbrief of een kaart.",
        //         ],
        //         'slug' => [
        //             'en' => 'template-block-page',
        //             'nl' => 'template-blok-pagina',
        //         ],
        //     ],
        //     'blocks' => [
        //         [
        //             'block_type' => 'template',
        //         ]
        //     ],
        // ],
    ];


    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = $this->pages;
        $langCodes = array_keys(LaravelLocalization::getSupportedLocales());

        foreach($pages as $code => $pageData){
            // create empty content_blocks
            $pageData['content']['content_blocks'] = ['en' => [], 'nl' => []];
            $pageData['content']['hero_image_copyright'] = ['en' => NULL, 'nl' => NULL]; // Necessary because Field 'hero_image_copyright' doesn't have a default value
            $pageData['content']['hero_image_title'] = ['en' => NULL, 'nl' => NULL]; // Necessary because Field 'hero_image_title' doesn't have a default value
            $pageDataEn = array_combine(array_keys($pageData['content']), array_column($pageData['content'],'en'));

            // make translatable page
            /* @var TranslatablePage $translatablePage */
            $translatablePage = TranslatablePage::updateOrCreate(['code'=> $code], $pageData['content']);
            foreach($langCodes as $langcode){
                // add seo
                $translatablePage->addMediaFromUrl($this->generateImageUrl(400,300))
                                 ->withCustomProperties(['locale' => $langcode])
                                 ->toMediaCollection($translatablePage->getSEOImageCollection());
                $pageData['content']['seo_title'][$langcode] = $this->faker->sentence();
                $pageData['content']['seo_description'][$langcode] = $this->faker->paragraph();
                $pageData['content']['seo_keywords'][$langcode] = [$this->faker->word(), $this->faker->word(), $this->faker->word()];
                // add hero image
                $translatablePage->addMediaFromUrl($this->generateImageUrl(400,300))
                                 ->withCustomProperties(['locale' => $langcode])
                                 ->toMediaCollection($translatablePage->getHeroImageCollection());
                $pageData['content']['hero_image_title'][$langcode] = $this->faker->sentence();
                $pageData['content']['hero_image_copyright'][$langcode] = $this->faker->sentence();
                // add overview
                $pageData['content']['overview_title'][$langcode] = $this->faker->sentence();
                $pageData['content']['overview_description'][$langcode] = $this->faker->paragraph();
                foreach($pageData['blocks'] as $block){
                    $pageData['content']['content_blocks'][$langcode][] = $this->makeBlockOfType($block, $translatablePage);
                }
            }
            TranslatablePage::updateOrCreate(['code'=> $code], $pageData['content']);

            // make simple page
            /* @var Page $page */
            $page = Page::updateOrCreate(['code'=> $code], $pageDataEn);
            // add seo
            $page->addMediaFromUrl($this->generateImageUrl(400,300))
                 ->toMediaCollection($page->getSEOImageCollection());
            $pageDataEn['content']['seo_title'] = $this->faker->sentence();
            $pageDataEn['content']['seo_description'] = $this->faker->paragraph();
            $pageDataEn['content']['seo_keywords'] = [$this->faker->word(), $this->faker->word(), $this->faker->word()];
            // add hero image
            $page->addMediaFromUrl($this->generateImageUrl(400,300))
                 ->toMediaCollection($page->getHeroImageCollection());
            $pageDataEn['content']['hero_image_title'] = $this->faker->sentence();
            $pageDataEn['content']['hero_image_copyright'] = $this->faker->sentence();
            // add overview
            $pageDataEn['content']['overview_title'] = $this->faker->sentence();
            $pageDataEn['content']['overview_description'] = $this->faker->paragraph();
            foreach($pageData['blocks'] as $block){
                $pageDataEn['content']['content_blocks'][] = $this->makeBlockOfType($block, $page);
            }
            Page::updateOrCreate(['code'=> $code], $pageDataEn['content']);
        }
    }

    private function makeBlockOfType(array $block, Model $page): array {
        return match ($block['block_type']) {
            'text' => $this->createTextBlock($page, ...$block),
            'video' => $this->createVideoBlock($page, ...$block),
            'image' => $this->createImageBlock($page, ...$block),
            'html' => $this->createHtmlBlock($page, ...$block),
            'text-image' => $this->createTextImageBlock($page, ...$block),
            'overview' => $this->createOverviewBlock($page, ...$block),
            'quote' => $this->createQuoteBlock($page, ...$block),
            'call-to-action' => $this->createCallToActionBlock($page, ...$block),
            'cards' => $this->createCardsBlock($page, ...$block),
            'template' => $this->createTemplateBlock($page, ...$block),
            default => $block,
        };
    }

    private function createTextBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "title" => $this->faker->sentence(),
                "content" => $this->faker->paragraph(),
                "block_style" => $block_style,
                "background_colour" => $background_colour,
            ],
            "type" => TextBlock::getName(),
        ];
    }

    private function createVideoBlock(Model $page, string $block_type): array {
        $image = $this->generateImageUrl(400,300);
        $mediaObject = $page->addMediaFromUrl($image)->toMediaCollection("filament-flexible-content-blocks::" . $block_type);
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "overlay_image" => $mediaObject->uuid ,
                "embed_url" => "https://www.youtube.com/watch?v=mw4k1tCnAuE", // TODO: uitzoeken hoe random video url genereren (of iets beters dan dit, evt zelf online zetten? Vragen aan iemand?) + video speelt niet: thema?
            ],
            "type" => VideoBlock::getName(),
        ];
    }

    private function createImageBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        $image = $this->generateImageUrl(400,300);
        $mediaObject = $page->addMediaFromUrl($image)
                            ->toMediaCollection(ImageBlock::getName());

        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "image" => $mediaObject->uuid ,
                "image_title" => $this->faker->sentence(),
                "image_width" => "50%",
                "image_position" => "center",
                "image_copyright" => $this->faker->sentence(),
                "image_conversion" => "contain",
                "block_style" => $block_style,
                "background_colour" => $background_colour,
            ],
            "type" => ImageBlock::getName(),
        ];
    }

    private function createHtmlBlock(Model $page, string $block_type): array {
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "content" => $this->faker->randomHtml(),
            ],
            "type" => HtmlBlock::getName(),
        ];
    }

    private function createTextImageBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        $image = $this->generateImageUrl(400,300);
        $mediaObject = $page->addMediaFromUrl($image)
                            ->toMediaCollection(TextImageBlock::getName());

        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "title" => $this->faker->sentence(),
                "text" => $this->faker->paragraph(),
                "image" => $mediaObject->uuid ,
                "image_title" => $this->faker->sentence(),
                "image_width" => "50%",
                "image_position" => "center",
                "image_copyright" => $this->faker->sentence(),
                "image_conversion" => "contain",
                "block_style" => $block_style,
                "background_colour" => $background_colour,
                //TODO: call to action ??
            ],
            "type" => TextImageBlock::getName(),
        ];
    }

    private function createOverviewBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
            ],
            "type" => OverviewBlock::getName(),
        ];
    }

    private function createQuoteBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "quote" => $this->faker->sentence(),
                "author" => $this->faker->name(),
                "block_style" => $block_style,
                "background_colour" => $background_colour,
            ],
            "type" => QuoteBlock::getName(),
        ];
    }

    private function createCallToActionBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        $image = $this->generateImageUrl(400,300);
        $mediaObject = $page->addMediaFromUrl($image)
                            ->toMediaCollection(CallToActionBlock::getName());

        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "text" => $this->faker->paragraph(),
                "image" => $mediaObject->uuid ,
                "title" => $this->faker->sentence(),
                "block_style" => $block_style,
                "image_title" => $this->faker->sentence(),
                "call_to_action" => [[
                    "url" => $this->faker->url(),
                    "route" => null,
                    "entry_id" => null,
                    "cta_model" => "url",
                    "button_label" => $this->faker->word(),
                    "button_style" => "secondary",
                    "button_open_new_window" => false
                ]],
                "image_copyright" => $this->faker->sentence(),
                "background_colour" => $background_colour
            ],
            "type" => CallToActionBlock::getName(),
        ];
    }

    private function createCardsBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        $cards = [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "title" => $this->faker->sentence(),
                "grid_columns" => 3,
                "image_conversion" => "crop",
                "block_style" => $block_style,
                "background_colour" => $background_colour,
                "cards" => [],
            ],
            "type" => CardsBlock::getName(),
        ];
        for($i=0; $i<10; $i++){
            $image = $this->generateImageUrl(400,300);
            $mediaObject = $page->addMediaFromUrl($image)
                                ->toMediaCollection(CardsBlock::getName());
            $cards["data"]["cards"][] = [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
                "title" =>  $this->faker->sentence(),
                "text" =>  $this->faker->paragraph(),
                "image" => $mediaObject->uuid ,
                "image_title" => $this->faker->sentence(),
                "image_width" => "50%",
                "image_position" => "center",
                "image_copyright" => $this->faker->sentence(),
                "image_conversion" => "contain",
                "card_call_to_action" => [],
            ];
        }
        return $cards;
    }

    private function createTemplateBlock(Model $page, string $block_type, string $block_style='default', string $background_colour='primary'): array {
        return [
            "data" => [
                BlockIdField::FIELD => BlockIdField::generateBlockId(),
            ],
            "type" => TemplateBlock::getName(),
        ];
    }


    private function generateImageUrl(int $width = 400, int $height = 300): string
    {
        return "https://picsum.photos/$width/$height";
    }



}

