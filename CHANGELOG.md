# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].


## [0.4.0] - 2020-10-01

### Updated

* all source code to `PHP 7.4`


[0.4.0]: https://github.com/codekandis/tiphy/compare/0.3.1...0.4.0

---
## [0.3.1] - 2020-09-29

### Fixed

* wrong prevent dispatchment condition in the class `ActionDispatcher`


[0.3.1]: https://github.com/codekandis/tiphy/compare/0.3.0...0.3.1

---
## [0.3.0] - 2020-09-28

### Added

* pre-dispatchment to prevent action dispatchment on demand


[0.3.0]: https://github.com/codekandis/tiphy/compare/0.2.0...0.3.0

---
## [0.2.0] - 2020-06-12

### Fixed

* a wrong method name in the `UriBuilderInterface`
* several inspection issues


[0.2.0]: https://github.com/codekandis/tiphy/compare/0.1.0...0.2.0

---
## 0.1.0 - 2020-06-12

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



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.0.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html