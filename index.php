<?php 

namespace mgfagency\processimageonupload;

use Kirby;
use \Kirby\Image\Darkroom;

Kirby::plugin('mgfagency/processimageonupload', [
  'options' => [
    'convert' => [
      'width' => 1280,
    ],
  ],
  'hooks' => [
    'file.create:after' => function ($file) {
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