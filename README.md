# Distance

The Distance Object.

## Install

```shell
composer require reusables/distance
```


## Usage

```php
<?php

use \Reusables\Unit\Distance;

$distance = new Distance(36, Distance::INCHES);
$feet = $distance->to(Distance::FEET)->value(); // 3
```

See docblocks for more details.


## License

This library is available under a MIT license.
