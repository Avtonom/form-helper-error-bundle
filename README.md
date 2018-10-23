Symfony 2 form error message text
=================================


Page bundle: https://github.com/Avtonom/form-helper-error-bundle


```sh

composer.phar require avtonom/form-helper-error-bundle ~1.1

```

Switching `~1.1` for the most recent tag.

Add the bundle to app/AppKernel.php

```php

$bundles(
    ...
        new FormHelper\ErrorBundle\FormHelperErrorBundle(),
    ...
);

```

#### Use

Symfony 3.3.15 and translator default disabled in config.

``` yaml

framework:
    translator: true
            
```

``` yaml

services:
    app:
        class: AppCommand
        arguments:
            - "@form.helper.error"
            
```

``` php

$this->formErrorHelper->getErrorsAsArray($form)

```

### Need Help?

1. Create an issue if you've found a bug,