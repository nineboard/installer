# Composer Installer for XE

[![code-style](https://github.com/nineboard/installer/actions/workflows/code-style.yml/badge.svg)](https://github.com/nineboard/installer/actions/workflows/code-style.yml)
[![run-tests](https://github.com/nineboard/installer/actions/workflows/run-tests.yml/badge.svg)](https://github.com/nineboard/installer/actions/workflows/run-tests.yml)

This package is a `composer-plugin` designed to facilitate the installation of XE plugins through Composer.

To ensure that the plugin is correctly installed by the package, the following conditions must be met in the `composer.json`:

- The `type` must be specified as `xpressengine-plugin`.
- The vendor name in the plugin's name must be `xpressengine-plugin`. (e.g., **xpressengine-plugin/package-name**)

For more details on the composer.json entries, please refer [here](https://getcomposer.org/doc/04-schema.md).

If you need more information about the plugin, please refer [here](https://xpressengine.gitbook.io/xpressengine-manual/ko/d50c-b7ec-adf8-c778).

## Formatting

```shell
composer lint
# Modify all files to comply with the PSR-12.

composer inspect
# Inspect all files to ensure compliance with PSR-12.
```

## Testing

```shell
composer test
# All tests with composer plugin
```
