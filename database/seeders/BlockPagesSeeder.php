<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\TranslatablePage;
use App\Models\User;
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
    protected $faker; // =  app(Generator::class);

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
        $faker = app(Generator::class);

        $blocks = [
            [
                'code' => 'TEXT_BLOCK_PAGE',
                'content' => [
                    'title' => [
                        'en' => 'Text block',
                        'nl' => 'Tekstblok',
                    ],
                    'intro' => [
                        'en' => "A basic block with title and text.",
                        'nl' => 'Een eenvoudig blok met titel en tekst.',
                    ],
                    'content_blocks' => [
                        'en' => [$this->createTextBlock()],
                        'nl' => [$this->createTextBlock()],
                    ],
                    'slug' => [
                        'en' => 'text-block-page',
                        'nl' => 'tekstblok-pagina',
                    ],
                ]
            ],
            [
                'code' => 'TEXT_IMAGE_BLOCK_PAGE',
                'content' => [
                    'title' => [
                        'en' => 'Text-image block',
                        'nl' => 'Tekst-afbeeldingblok',
                    ],
                    'intro' => [
                        'en' => "A basic block with title, image and text.",
                        'nl' => 'Een eenvoudig blok met titel, afbeelding en tekst.',
                    ],
                    'content_blocks' => [
                        'en' => [$this->createTextImageBlock()],
                        'nl' => [$this->createTextImageBlock()],
                    ],
                    'slug' => [
                        'en' => 'text-image-block-page',
                        'nl' => 'tekst-afbeelding-blok-pagina',
                    ],
                ]
            ],
            [
                'code' => 'IMAGE_BLOCK_PAGE',
                'content' => [
                    'title' => [
                        'en' => 'Image block',
                        'nl' => 'Afbeeldingblok',
                    ],
                    'intro' => [
                        'en' => "A basic block with title and image.",
                        'nl' => 'Een eenvoudig blok met titel en afbeelding',
                    ],
                    'content_blocks' => [
                        'en' => [$this->createImageBlock()],
                        'nl' => [$this->createImageBlock()],
                    ],
                    'slug' => [
                        'en' => 'image-block-page',
                        'nl' => 'afbeelding-blok-pagina',
                    ],
                ]
            ],
        ];

        foreach($blocks as $block){
            // add hero image
            $block['content']['hero_image_copyright'] = ['en' => NULL, 'nl' => NULL];
            $block['content']['hero_image_title'] = ['en' => NULL, 'nl' => NULL];

            TranslatablePage::updateOrCreate(['code'=> $block['code']], $block['content']);

            $block_content_en = array_combine(array_keys($block['content']), array_column($block['content'],'en'));
            Page::updateOrCreate(['code'=> $block['code']], $block_content_en);
        }

    }


    private function createTextBlock(){
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

    private function createVideoBlock() {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::video",
        ];
    }

    private function createImageBlock() {
        $image = $this->faker->image(public_path(),400,300, null, false);
        $mediaObject = User::all()->first()->get()->addMedia($image)->toMediaCollection('images');
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

    private function createHtmlBlock() {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::html",
        ];
    }

    private function createTextImageBlock() {
        $image = $this->faker->image(public_path(),400,300, null, false);
        $mediaObject = User::all()->first()->get()->addMedia($image)->toMediaCollection('images');
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

    private function createOverviewBlock() {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::",
        ];
    }

    private function createQuoteBlock() {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::",
        ];
    }

    private function createCallToActionBlock() {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::",
        ];
    }

    private function createCardsBlock() {
            return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::",
        ];
    }

    private function createTemplateBlock() {
        return [
            "data" => [

            ],
            "type" => "filament-flexible-content-blocks::",
        ];
    }



}

