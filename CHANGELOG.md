# Changelog

All notable changes to `arionum-api` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](https://keepachangelog.com) principles.

## [Unreleased]

## [v1.0.0-alpha.4] - 2019-02-04

### Fixed
- Fix reference URI links in account/block transformers ([0363484](https://github.com/pxgamer/arionum-api/commit/036348442ac0e5b1fa6cde49d385d0922be7402b))

## [v1.0.0-alpha.3] - 2019-02-04

### Added
- Add Block Explorer links to the API ([a14bb68](https://github.com/pxgamer/arionum-api/commit/a14bb6847cc6aacd697f2e6dfbf2b25481985aa0))

### Changed
- Merge API components to a `v1` namespace ([5c2d69a](https://github.com/pxgamer/arionum-api/commit/5c2d69a84710f67260b55cee9f8095ea57aae38a))

### Removed
- Remove `Content-Type` detection middleware ([7de2652](https://github.com/pxgamer/arionum-api/commit/7de2652f0485fbfd35f727bcd07ca90ae335d2b6))
- Remove redundant feature tests ([2196b9f](https://github.com/pxgamer/arionum-api/commit/2196b9f687f1d329c90192071d64908cc14b53fb))

## [v1.0.0-alpha.2] - 2018-12-19

### Added
- Add 'self' reference links to transformer output ([95ddfd81](https://github.com/pxgamer/arionum-api/commit/95ddfd811583556481d3f4355d44d66c5dc9ad18))

### Changed
- Update middleware to throw exceptions for consistency ([9ddc517f](https://github.com/pxgamer/arionum-api/commit/9ddc517f2b819e340992f18c37547668759a19e3))
- Order eloquent results by the date column ([1c70e846](https://github.com/pxgamer/arionum-api/commit/1c70e8469c277888a6a987d4b960cc9498d39add))
- Update 'block' to 'block_id' for transformers ([4a77e0e5](https://github.com/pxgamer/arionum-api/commit/4a77e0e59dd747da877fe3c9c2456735e69fffc3))
- Update to use `_address` suffix for transformers ([215f5dc6](https://github.com/pxgamer/arionum-api/commit/215f5dc694f09b036ba6afe4e2f2b3741b8e2234))

## v1.0.0-alpha.1 - 2018-12-18

### Added
- Initial release for alpha use

[Unreleased]: https://github.com/pxgamer/arionum-api/compare/master...develop
[v1.0.0-alpha.4]: https://github.com/pxgamer/arionum-api/compare/v1.0.0-alpha.3...v1.0.0-alpha.4
[v1.0.0-alpha.3]: https://github.com/pxgamer/arionum-api/compare/v1.0.0-alpha.2...v1.0.0-alpha.3
[v1.0.0-alpha.2]: https://github.com/pxgamer/arionum-api/compare/v1.0.0-alpha.1...v1.0.0-alpha.2
