<?php 

use \Kirby\Image\Darkroom;

Kirby::plugin('mgf/processimageonupload', [
  'options' => [
    'convert' => [
      'width' => 1280,
    ],
  ],
  'hooks' => [
    'file.create:after' => function ($file) {
      $darkroom = Darkroom::factory(option('thumbs.driver') ?? 'gd', option('mgf.processimageonupload.convert'));
      $darkroom->process($file->root());
    }
  ]
]);