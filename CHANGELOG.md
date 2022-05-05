# Changelog

All notable changes to `laravel-filepond` will be documented in this file.

## 0.4.1 - 2022-05-05

- Added custom `Rule::filepond()` to validate uploaded files. ✨
- Added option to `getDataURL()` from file. Know more about the format [here](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URIs).
- Readme updated with new validation example.


## 0.3.1 - 2021-12-31

- Added support for chunk upload with resume capability. ✨
- Added option to change visibility when using third party storage.
- Updated quickstart example in readme.
- Updated `./filepond/config.php` to change url from one place. 

## 0.2.1 - 2021-12-25

- Added option to override permanent storage disk during copying/moving file.

## 0.2.0 - 2021-12-25

- Added support for third party storage. ✨
- File submit response now contains file location and URL for better management.
- Code base restructure and performance improvement.
- Laravel 7 test cases added.

## 0.1.0 - 2021-10-31

- Added Laravel 7 support.
