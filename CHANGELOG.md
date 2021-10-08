# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [0.35.0] - 2021-10-08

### Changed

* moved the method `RepositoryInterface::asTransaction()` to the database connector level.

[0.35.0]: https://github.com/codekandis/tiphy/compare/0.34.0..0.35.0

---
## [0.34.0] - 2021-10-08

### Added

* type checks to all converters

[0.34.0]: https://github.com/codekandis/tiphy/compare/0.33.0..0.34.0

---
## [0.33.0] - 2021-10-07

### Added

* additional bi-directional converters
* value type checks in all converters

### Fixed

* converters and their naming

[0.33.0]: https://github.com/codekandis/tiphy/compare/0.32.0..0.33.0

---
## [0.32.0] - 2021-09-21

### Added

* requested URI to the pre-dispatcher
* requested route to the abstract action
* removable headers to the HTTP abstract responder
* HTTP redirect responder

[0.32.0]: https://github.com/codekandis/tiphy/compare/0.31.0..0.32.0

---
## [0.31.0] - 2021-09-14

### Added

* requested URI to the pre-dispatcher
* requested route to the abstract action
* removable headers to the HTTP abstract responder
* HTTP redirect responder

[0.31.0]: https://github.com/codekandis/tiphy/compare/0.30.2..0.31.0

---
## [0.30.2] - 2021-09-03

### Fixed

* the database connection failed exception message

[0.30.2]: https://github.com/codekandis/tiphy/compare/0.30.1..0.30.2

---
## [0.30.1] - 2021-09-02

### Fixed

* default values in the octet stream responder
* missing type hints
* PHPDoc

[0.30.1]: https://github.com/codekandis/tiphy/compare/0.30.0..0.30.1

---
## [0.30.0] - 2021-08-29

### Added

* new two-ways converters

### Changed

* PHPDoc of existing two-ways converters

### Fixed

* inheritance of entities

[0.30.0]: https://github.com/codekandis/tiphy/compare/0.29.0..0.30.0

---
## [0.29.0] - 2021-08-13

### Changed

* composer package dependencies
  * added
    * `codekandis/regular-expressions` [^0]
* replaced regex functions with library implementations

[0.29.0]: https://github.com/codekandis/tiphy/compare/0.28.3..0.29.0

---
## [0.28.3] - 2021-04-25

### Removed

* exceptions while missing array keys in mapped array validators

[0.28.3]: https://github.com/codekandis/tiphy/compare/0.28.2..0.28.3

---
## [0.28.2] - 2021-04-24

### Fixed

* usage of reflection object instead of reflection class in the entity property mapper

[0.28.2]: https://github.com/codekandis/tiphy/compare/0.28.1..0.28.2

---
## [0.28.1] - 2021-04-24

### Fixed

* throws exceptions while missing properties in entity property mappers
* throws exceptions while missing array keys in mapped array validators

[0.28.1]: https://github.com/codekandis/tiphy/compare/0.28.0..0.28.1

---
## [0.28.0] - 2021-04-24

### Added

* various validators

[0.28.0]: https://github.com/codekandis/tiphy/compare/0.27.0..0.28.0

---
## [0.27.0] - 2021-04-23

### Added

* mapped array validator

### Fixed

* PHPDoc

[0.27.0]: https://github.com/codekandis/tiphy/compare/0.26.0..0.27.0

---
## [0.26.0] - 2021-04-22

### Added

* validator to validate against regular expressions 

[0.26.0]: https://github.com/codekandis/tiphy/compare/0.25.0..0.26.0

---
## [0.25.0] - 2021-04-22

### Added

* enum to array converter
* various validators

[0.25.0]: https://github.com/codekandis/tiphy/compare/0.24.1..0.25.0

---
## [0.24.1] - 2021-04-19

### Added

* missing methods `EntityInterface::toObject()` and `AbstractEntity::toObject()`

### Changed

* parameter and return types from `object` to `stdClass` in the interface `EntityInterface` and the class `AbstractEntity`
* parameter and return types from `object` to `stdClass` in the interface `EntityPropertyMapperInterface` and the class `EntityPropertyMapper`
* PHPDoc type hints in the interface ` ConnectorInterface` and the class `Connector`

### Fixed

* missing PHPDoc annotated exceptions

[0.24.1]: https://github.com/codekandis/tiphy/compare/0.24.0..0.24.1

---
## [0.24.0] - 2021-04-18

### Added

* `StringToBoolConverter`

[0.24.0]: https://github.com/codekandis/tiphy/compare/0.23.0..0.24.0

---
## [0.23.0] - 2021-04-16

### Added

* one way and two ways converter interfaces
* entity property mappings to map between arrays and entities with optional converters

### Changed

* replaced entity class names with entity property mappers in database connectors

[0.23.0]: https://github.com/codekandis/tiphy/compare/0.22.0..0.23.0

---
## [0.22.0] - 2021-03-20

### Added

* `NotFoundEntityInterface`
* HTTP response status `103 Early Hints`

### Changed

* implemented the `NotFoundEntityInterface`
* return type of `OptionsRequest::fetchFormattedResponse()`

### Fixed

* PHPDoc

[0.22.0]: https://github.com/codekandis/tiphy/compare/0.21.0..0.22.0

---
## [0.20.0] - 2021-03-08

### Fixed

* handling of errors on fetching results

### Changed

* PHPDoc

[0.20.0]: https://github.com/codekandis/tiphy/compare/0.19.0..0.20.0

---
## [0.19.0] - 2021-03-02

### Removed

* redundancy

### Added

* specific persistence exceptions

### Changed

* PHPDoc

[0.19.0]: https://github.com/codekandis/tiphy/compare/0.18.0..0.19.0

---
## [0.18.0] - 2021-02-25

### Added

* inner exceptions to all persistence exceptions.

[0.18.0]: https://github.com/codekandis/tiphy/compare/0.17.0..0.18.0

---
## [0.17.0] - 2021-02-25

### Added

* MariaDB repository interface
* transactions by closure

[0.17.0]: https://github.com/codekandis/tiphy/compare/0.16.0..0.17.0

---
## [0.16.0] - 2021-02-25

### Added

* transactional exceptions
* exceptions on preparing statements

[0.16.0]: https://github.com/codekandis/tiphy/compare/0.15.0..0.16.0

---
## [0.15.0] - 2021-02-24

### Added

* executing multiple statements in database connector
* specific persistence exceptions

[0.15.0]: https://github.com/codekandis/tiphy/compare/0.14.0..0.15.0

---
## [0.14.0] - 2021-02-24

### Added

* persistence connector attributes

[0.14.0]: https://github.com/codekandis/tiphy/compare/0.13.0..0.14.0

---
## [0.13.0] - 2021-02-23

### Added

* commands
* command handlers
* command handler results
* queries
* query handlers
* query handler results

[0.13.0]: https://github.com/codekandis/tiphy/compare/0.12.0..0.13.0

---
## [0.12.0] - 2021-02-23

### Added

* displaying request information on `404 Not Found`

[0.12.0]: https://github.com/codekandis/tiphy/compare/0.11.0..0.12.0

---
## [0.11.0] - 2021-02-02

### Added

* displaying request information on `404 Not Found`

[0.11.0]: https://github.com/codekandis/tiphy/compare/0.10.0..0.11.0

---
## [0.10.0] - 2021-01-31

### Added

* entity extenders

[0.10.0]: https://github.com/codekandis/tiphy/compare/0.9.0..0.10.0

---
## [0.9.0] - 2021-01-29

### Changed

* action dispatcher

[0.9.0]: https://github.com/codekandis/tiphy/compare/0.8.0..0.9.0

---
## [0.8.0] - 2021-01-29

### Changed

* routes configuration

[0.8.0]: https://github.com/codekandis/tiphy/compare/0.7.0..0.8.0

---
## [0.7.0] - 2021-01-29

### Changed

* `PHPUnit` configuration
* configuration instantiation

[0.7.0]: https://github.com/codekandis/tiphy/compare/0.6.0..0.7.0

---
## [0.6.0] - 2021-01-18

### Changed

* composer package dependencies
  * removed
    * `sensiolabs/security-checker`
    * `phpunit/phpunit`
    * `codekandis/code-message-interpreter`
  * changed
    * `codekandis/json-codec` [^2]
  * added
    * `codekandis/phpunit` [^3]
    * `codekandis/constants-classes-interpreter` [^1]
* swapped the code message interpreter with the constants classes translator
* PHPDoc comments

[0.6.0]: https://github.com/codekandis/tiphy/compare/0.5.0..0.6.0

---
## [0.5.0] - 2021-01-09

### Added

* PDO array helper for prepared statements

### Fixed

* project name in the `README.md`

[0.5.0]: https://github.com/codekandis/tiphy/compare/0.4.0..0.5.0

---
## [0.4.0] - 2020-10-01

### Updated

* all source code to `PHP 7.4`

[0.4.0]: https://github.com/codekandis/tiphy/compare/0.3.1..0.4.0

---
## [0.3.1] - 2020-09-29

### Fixed

* wrong prevent dispatchment condition in the class `ActionDispatcher`

[0.3.1]: https://github.com/codekandis/tiphy/compare/0.3.0..0.3.1

---
## [0.3.0] - 2020-09-28

### Added

* pre-dispatchment to prevent action dispatchment on demand

[0.3.0]: https://github.com/codekandis/tiphy/compare/0.2.0..0.3.0

---
## [0.2.0] - 2020-06-12

### Fixed

* a wrong method name in the `UriBuilderInterface`
* several inspection issues

[0.2.0]: https://github.com/codekandis/tiphy/compare/0.1.0..0.2.0

---
## [0.1.0] - 2020-06-12

### Added

* CURL
    * options request
    * response headers
* configurations
    * abstract configuration
        * abstract configuration registry
* HTTP
    * content types
    * routes configuration
    * requests
        * methods
        * routes configuration
        * range interpreter
        * JSON body
    * responses
        * status codes, messages and code-message-interpreter
        * HTML template responder
        * JSON responder
        * octet stream responder
    * URI builders
        * URI builder configuration
        * abstract URI builder
* renderers
    * template renderer configuration
    * template renderer
    * JSON renderer
    * rendered content
* persistence
    * persistence configuration
    * MariaDB
        * connector
        * abstract repository
* entitites
    * abstract entity
    * URI extender interface
* actions
    * abstract action
    * dispatcher
    * internal server error action
    * method not allowed action
    * not found action
* throwables
    * error information
    * handlers
        * throwable handler interface
        * internal server error throwable handler
* `CODE_OF_CONDUCT.md`
* `LICENSE`
* `README.md`

[0.1.0]: https://github.com/codekandis/tiphy/tree/0.1.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.0.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
