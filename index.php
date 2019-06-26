<?php 

namespace mgfagency\processimageonupload;

use Kirby;
use \Kirby\Image\Darkroom;

Kirby::plugin('mgfagency/processimageonupload', [
  'options' => [
    'convert' => [
      'width' => 1280,
    ],
    'excludeTemplates' => [],
  ],
  'hooks' => [
    'file.create:after' => function ($file) {
      if (in_array($file->page()->template(), option('mgfagency.processimageonupload.excludeTemplates'))) {
        return true;
      }
      
      if($file->isResizable()) {
        $darkroom = Darkroom::factory(option('thumbs.driver') ?? 'gd', option('mgfagency.processimageonupload.convert'));
        $darkroom->process($file->root());
      }
    },
    'file.replace:after' => function ($newFile, $oldFile) {
      kirby()->trigger('file.create:after', $newFile);
    }
  ]
]);