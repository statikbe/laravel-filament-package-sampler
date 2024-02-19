<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\TranslatablePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class BlockPagesSeeder extends Seeder
{
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
        //TODO steek deze data ergens anders dan is je run function veel cleaner. in een class var of een function.
<<<<<<< HEAD
        $pages = [
=======
        $blocks = [
>>>>>>> fac21e78e282c74ba8975ba312308047d6d0fec9
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
        ];

        foreach($pages as $code => $page){
            // add hero image
            //TODO gebruik faker om content in te vullen
<<<<<<< HEAD
            $page['content']['hero_image_copyright'] = ['en' => NULL, 'nl' => NULL];
            $page['content']['hero_image_title'] = ['en' => NULL, 'nl' => NULL];
            $page['content']['content_blocks'] = ['en' => [], 'nl' => []];
            $page_content_en = array_combine(array_keys($page['content']), array_column($page['content'],'en'));

            //TODO: 1 model per seeder
=======
            $block['content']['hero_image_copyright'] = ['en' => NULL, 'nl' => NULL];
            $block['content']['hero_image_title'] = ['en' => NULL, 'nl' => NULL];
            $block['content']['content_blocks'] = ['en' => [], 'nl' => []];
            $block_content_en = array_combine(array_keys($block['content']), array_column($block['content'],'en'));
>>>>>>> fac21e78e282c74ba8975ba312308047d6d0fec9

            //TODO: 1 model per seeder

            // make translatable page
            $translatable_page = TranslatablePage::updateOrCreate(['code'=> $code], $page['content']);
            foreach($page['blocks'] as $block){
                $page['content']['content_blocks']['en'][] = $this->makeBlockOfType($block, $translatable_page);
                $page['content']['content_blocks']['nl'][] = $this->makeBlockOfType($block, $translatable_page);
            }
            TranslatablePage::updateOrCreate(['code'=> $code], $page['content']);

            // make simple page
            $simple_page = Page::updateOrCreate(['code'=> $code], $page_content_en);
            foreach($page['blocks'] as $block){
                $page_content_en['content']['content_blocks'][] = $this->makeBlockOfType($block, $simple_page);
            }
            Page::updateOrCreate(['code'=> $code], $page_content_en['content']);
        }
    }

    private function makeBlockOfType($block, $page){
        $type = $block['block_type'];
        unset($block['block_type']);
        switch($type) {
            case 'text':
                $block = $this->createTextBlock($page, ...$block);
                break;
            case 'video':
                $block = $this->createVideoBlock($page, ...$block);
                break;
            case 'image':
                $block = $this->createImageBlock($page, ...$block);
                break;
            case 'html':
                $block = $this->createHtmlBlock($page, ...$block);
                break;
            case 'text-image':
                $block = $this->createTextImageBlock($page, ...$block);
                break;
            case 'overview':
                $block = $this->createOverviewBlock($page, ...$block);
                break;
            case 'quote':
                $block = $this->createQuoteBlock($page, ...$block);
                break;
            case 'call-to-action':
                $block = $this->createCallToActionBlock($page, ...$block);
                break;
            case 'cards':
                $block = $this->createCardsBlock($page, ...$block);
                break;
            case 'template':
                $block = $this->createTemplateBlock($page, ...$block);
                break;
        }
        return $block;
    }

    private function createTextBlock($page, $block_style='default', $background_colour='primary'){
        return [
            "data" => [
                "title" => $this->faker->sentence(),
                "content" => $this->faker->paragraph(),
                "block_style" => $block_style,
                "background_colour" => $background_colour,
            ],
            "type" => "filament-flexible-content-blocks::text",
        ];
    }

    private function createVideoBlock($page, $block_style='default', $background_colour='primary') {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::video",
        ];
    }

    private function createImageBlock($page, $block_style='default', $background_colour='primary') {
        $image = $this->faker->image(public_path(),400,300, category:null, fullPath:true);
        $mediaObject = $page->addMedia($image)->toMediaCollection("filament-flexible-content-blocks::image");
        return [
            "data" => [
                "image" => $mediaObject->uuid ,
                "image_title" => $this->faker->sentence(),
                "image_width" => "50%",
                "image_position" => "center",
                "image_copyright" => $this->faker->sentence(),
                "image_conversion" => "contain",
                "block_style" => $block_style,
                "background_colour" => $background_colour,
            ],
            "type" => "filament-flexible-content-blocks::image",
        ];
    }

    private function createHtmlBlock($page, $block_style='default', $background_colour='primary') {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::html",
        ];
    }

    private function createTextImageBlock($page, $block_style='default', $background_colour='primary') {
        $image = $this->faker->image(public_path(),400,300, category:null, fullPath:true);
        $mediaObject = $page->addMedia($image)->toMediaCollection("filament-flexible-content-blocks::text-image");
        return [
            "data" => [
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
            "type" => "filament-flexible-content-blocks::text-image",
        ];
    }

    private function createOverviewBlock($page, $block_style='default', $background_colour='primary') {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::overview",
        ];
    }

    private function createQuoteBlock($page, $block_style='default', $background_colour='primary') {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::quote",
        ];
    }

    private function createCallToActionBlock($page, $block_style='default', $background_colour='primary') {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::call-to-action",
        ];
    }

    private function createCardsBlock($page, $block_style='default', $background_colour='primary') {
        $cards = [
            "data" => [
                "title" => $this->faker->sentence(),
                "grid_columns" => 3,
                "image_conversion" => "crop",
                "block_style" => $block_style,
                "background_colour" => $background_colour,
                "cards" => [],
            ],
            "type" => "filament-flexible-content-blocks::cards",
        ];
        for($i=0; $i<10; $i++){
            $image = $this->faker->image(public_path(),400,300, category:null, fullPath:true);
            $mediaObject = $page->addMedia($image)->toMediaCollection("filament-flexible-content-blocks::cards");
            $cards["data"]["cards"][] = [
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

    private function createTemplateBlock($page, $block_style='default', $background_colour='primary') {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::template",
        ];
    }



}

