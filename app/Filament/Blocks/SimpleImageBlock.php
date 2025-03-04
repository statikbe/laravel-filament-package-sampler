<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\HtmlableMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBackgroundColour;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBlockStyle;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasImage;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasImageConversionType;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasImageWidth;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BackgroundColourField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BlockSpatieMediaLibraryFileUpload;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BlockStyleField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\ImageConversionTypeField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\ImagePositionField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\ImageWidthField;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasMediaAttributes;

class SimpleImageBlock extends AbstractContentBlock
{
    public ?string $image;

    public ?string $imageTitle;

    /**
     * Create a new component instance.
     */
    public function __construct(HasContentBlocks&HasMedia $record, ?array $blockData)
    {
        parent::__construct($record, $blockData);

        $this->image = $blockData['image'] ?? null;
        $this->imageTitle = $blockData['image_title'] ?? null;
    }

    public static function getIcon(): string
    {
        return 'heroicon-o-camera';
    }

    /**
     * {@inheritDoc}
     */
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            Grid::make(2)->schema([
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('simple_images')
                    ->image()
                    ->label(static::getFieldLabel('image'))
                    ->maxFiles(1),
                Grid::make(1)->schema([
                    TextInput::make('image_title')
                        ->label(static::getFieldLabel('image_title'))
                        ->maxLength(255),
                ])->columnSpan(1),
            ]),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function addMediaCollectionAndConversion(HasMedia&HasMediaAttributes $record): void
    {

    }

    public function getSearchableContent(): array
    {
        $searchable = [];

        $this->addSearchableContent($searchable, $this->imageTitle);

        return $searchable;
    }

    public static function getName(): string
    {
        return 'simple_image';
    }

    public static function getLabel(): string
    {
        return 'Simple Image';
    }

    public static function getFieldLabel(string $field): string
    {
        return trans("messages.blocks.simple_image.$field");
    }

    public function render()
    {
        return view('test');
    }
}
