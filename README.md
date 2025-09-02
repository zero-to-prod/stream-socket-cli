# Zerotoprod\StreamSocketCli

![](art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/stream-socket-cli)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/stream-socket-cli/test.yml?label=test)](https://github.com/zero-to-prod/stream-socket-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/stream-socket-cli/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/stream-socket-cli/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/stream-socket-cli/build_docker_image.yml?label=build_docker_image)](https://github.com/zero-to-prod/stream-socket-cli/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/stream-socket-cli?color=blue)](https://packagist.org/packages/zero-to-prod/stream-socket-cli/stats)
[![php](https://img.shields.io/packagist/php-v/zero-to-prod/stream-socket-cli.svg?color=purple)](https://packagist.org/packages/zero-to-prod/stream-socket-cli/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/stream-socket-cli?color=f28d1a)](https://packagist.org/packages/zero-to-prod/stream-socket-cli)
[![License](https://img.shields.io/packagist/l/zero-to-prod/stream-socket-cli?color=pink)](https://github.com/zero-to-prod/stream-socket-cli/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/stream-socket-cli.svg)](https://wakatime.com/badge/github/zero-to-prod/stream-socket-cli)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/stream-socket-cli?branch=main)](https://hitsofcode.com/github/zero-to-prod/stream-socket-cli/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation Publishing](#documentation-publishing)
    - [Automatic Documentation Publishing](#automatic-documentation-publishing)
- [Usage](#usage)
    - [Available Commands](#available-commands)
        - [`stream-socket-cli:src`](#stream-socket-clisrc)
        - [`stream-socket-cli:remote-socket-name`](#stream-socket-cliremote-socket-name)
        - [`stream-socket-cli:local-socket-name`](#stream-socket-clilocal-socket-name)
        - [`stream-socket-cli:send-to`](#stream-socket-clisend-to)
        - [`stream-socket-cli:supports-lock`](#stream-socket-clisupports-lock)
        - [`stream-socket-cli:get-options`](#stream-socket-cliget-options)
- [Docker Image](#docker-image)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Image Development](./IMAGE_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

A CLI for a stream socket.

## Requirements

- PHP 8.1 or higher.

## Installation

Install `Zerotoprod\StreamSocketCli` via [Composer](https://getcomposer.org/):

```bash
composer require zero-to-prod/stream-socket-cli
```

This will add the package to your project's dependencies and create an autoloader entry for it.

## Documentation Publishing

You can publish this README to your local documentation directory.

This can be useful for providing documentation for AI agents.

This can be done using the included script:

```bash
# Publish to default location (./docs/zero-to-prod/stream-socket-cli)
vendor/bin/zero-to-prod-stream-socket-cli

# Publish to custom directory
vendor/bin/zero-to-prod-stream-socket-cli /path/to/your/docs
```

### Automatic Documentation Publishing

You can automatically publish documentation by adding the following to your `composer.json`:

```json
{
    "scripts": {
        "post-install-cmd": [
            "zero-to-prod-stream-socket-cli"
        ],
        "post-update-cmd": [
            "zero-to-prod-stream-socket-cli"
        ]
    }
}
```

## Usage

Run this command to see the available commands:

```shell
vendor/bin/stream-socket-cli list
```

### Available Commands

#### `stream-socket-cli:src`

Displays the project's GitHub repository URL.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:src
```

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:src
```

**Output:**
```
https://github.com/zero-to-prod/stream-socket-cli
```

#### `stream-socket-cli:remote-socket-name`

Returns the remote socket name for a given URL connection.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:remote-socket-name <url>
```

**Arguments:**
- `url` (required): The URL to connect to

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:remote-socket-name ssl://google.com:443
```

**Output:**
```
74.125.224.102:443
```

#### `stream-socket-cli:local-socket-name`

Returns the local socket name for a given URL connection.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:local-socket-name <url>
```

**Arguments:**
- `url` (required): The URL to connect to

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:local-socket-name ssl://google.com:443
```

**Output:**
```
192.168.1.100:52345
```

#### `stream-socket-cli:send-to`

Sends a message to a socket, whether it is connected or not.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:send-to <url> <data> [--flags] [--address]
```

**Arguments:**
- `url` (required): The URL to connect to
- `data` (required): The data to be sent

**Options:**
- `--flags`: The value of flags can be any combination of the following: STREAM_OO
- `--address`: The address specified when the socket stream was created will be used unless an alternate address is specified in address. If specified, it must be in dotted quad (or [ipv6]) format

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:send-to tcp://httpbin.org:80 "GET / HTTP/1.1\r\nHost: httpbin.org\r\n\r\n"
```

**Output:**
```
42
```

#### `stream-socket-cli:supports-lock`

Tells whether the stream supports locking. Returns the URL for true, otherwise returns an empty string.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:supports-lock <url>
```

**Arguments:**
- `url` (required): The URL to connect to

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:supports-lock ssl://google.com:443
```

**Output (if supports locking):**
```
ssl://google.com:443
```

**Output (if doesn't support locking):**
```

```

#### `stream-socket-cli:get-options`

Retrieve options for a stream/wrapper/context.

**Usage:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:get-options <url>
```

**Arguments:**
- `url` (required): The URL to connect to

**Example:**
```bash
vendor/bin/stream-socket-cli stream-socket-cli:get-options ssl://google.com:443
```

**Output:**
```json
{
    "ssl": {
        "peer_name": "google.com",
        "verify_peer": true,
        "verify_peer_name": true
    }
}
```

## Docker Image

You can also run the cli using the [docker image](https://hub.docker.com/repository/docker/davidsmith3/stream-socket-cli/general):

```shell
docker run --rm davidsmith3/stream-socket-cli
```

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/stream-socket-cli/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
