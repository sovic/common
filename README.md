# Sovic\Common

Add the following to your `config/services.yaml` file:

```
    Sovic\Common\:
        resource: '../vendor/sovic/common/src/'
        exclude:
            - '../vendor/sovic/common/src/Entity/'
```