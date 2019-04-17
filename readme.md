# Kirby 3 Plugin - Process Image On Upload

![Kirby Version](https://img.shields.io/badge/Kirby-3%2B-black.svg)

## Installation

### Download

Download and copy this repository to `/site/plugins/kirby-processimageonupload`.

### Git submodule

```
git submodule add https://github.com/mgfagency/kirby-processimageonupload.git site/plugins/kirby-processimageonupload
```

### Composer

```
composer require mgfagency/kirby-processimageonupload
```

## Usage

Uploaded images get converted to maxwidth 1280px on upload after installation. Change the config according to your needs. 

## Options

All options require `mgfagency.processimageonupload.` as prefix.

**convert**

- default: `array('width' => 1280)`
- content of this folder is loaded into the help view of the panel

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment.

## License

[MIT](LICENSE.md)
