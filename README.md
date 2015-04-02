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

// instantiate
$distance = new Distance(36, Distance::INCHES);

// convert
$feet = $distance->to(Distance::FEET)->value(); // 3 (FEET)

// add
$inches = $distance->add(new Distance(1, Distance::FEET))->value(); // 48 (INCHES)
```

See docblocks for more details.


## License

This library is available under a MIT license.
