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
        $blocks = [
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
                'blocks' => ['text']
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
                'blocks' => ['text-image']
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
                'blocks' => ['image']
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
                'blocks' => ['cards']
            ],
        ];

        foreach($blocks as $code => $block){
            // add hero image
            $block['content']['hero_image_copyright'] = ['en' => NULL, 'nl' => NULL];
            $block['content']['hero_image_title'] = ['en' => NULL, 'nl' => NULL];
            $block['content']['content_blocks'] = ['en' => [], 'nl' => []];
            $block_content_en = array_combine(array_keys($block['content']), array_column($block['content'],'en'));

            // make translatable page
            $page = TranslatablePage::updateOrCreate(['code'=> $code], $block['content']);
            foreach($block['blocks'] as $blocktype){
                $block['content']['content_blocks']['en'][] = $this->makeBlockOfType($blocktype, $page);
                $block['content']['content_blocks']['nl'][] = $this->makeBlockOfType($blocktype, $page);
            }
            TranslatablePage::updateOrCreate(['code'=> $code], $block['content']);

            // make simple page
            $page = Page::updateOrCreate(['code'=> $code], $block_content_en);
            foreach($block['blocks'] as $blocktype){
                $block_content_en['content']['content_blocks'][] = $this->makeBlockOfType($blocktype, $page);
            }
            Page::updateOrCreate(['code'=> $code], $block_content_en['content']);
        }
    }

    private function makeBlockOfType($type, $page){
        switch($type) {
            case 'text':
                $block = $this->createTextBlock($page);
                break;
            case 'video':
                $block = $this->createVideoBlock($page);
                break;
            case 'image':
                $block = $this->createImageBlock($page);
                break;
            case 'html':
                $block = $this->createHtmlBlock($page);
                break;
            case 'text-image':
                $block = $this->createTextImageBlock($page);
                break;
            case 'overview':
                $block = $this->createOverviewBlock($page);
                break;
            case 'quote':
                $block = $this->createQuoteBlock($page);
                break;
            case 'call-to-action':
                $block = $this->createCallToActionBlock($page);
                break;
            case 'cards':
                $block = $this->createCardsBlock($page);
                break;
            case 'template':
                $block = $this->createTemplateBlock($page);
                break;
        }
        return $block;
    }

    private function createTextBlock($page){
        return [
            "data" => [
                "title" => $this->faker->sentence(),
                "content" => $this->faker->paragraph(),
                "block_style" => "default",
                "background_colour" => "primary",
            ],
            "type" => "filament-flexible-content-blocks::text",
        ];
    }

    private function createVideoBlock($page) {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::video",
        ];
    }

    private function createImageBlock($page) {
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
                "block_style" => "default",
                "background_colour" => "primary",
            ],
            "type" => "filament-flexible-content-blocks::image",
        ];
    }

    private function createHtmlBlock($page) {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::html",
        ];
    }

    private function createTextImageBlock($page) {
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
                "block_style" => "default",
                "background_colour" => "primary",
                //TODO: call to action ??
            ],
            "type" => "filament-flexible-content-blocks::text-image",
        ];
    }

    private function createOverviewBlock($page) {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::overview",
        ];
    }

    private function createQuoteBlock($page) {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::quote",
        ];
    }

    private function createCallToActionBlock($page) {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::call-to-action",
        ];
    }

    private function createCardsBlock($page) {
        $cards = [
            "data" => [
                "title" => $this->faker->sentence(),
                "grid_columns" => 3,
                "block_style" => "default",
                "image_conversion" => "crop",
                "background_colour" => "primary",
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

    private function createTemplateBlock($page) {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::template",
        ];
    }



}

