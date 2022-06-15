#### Create a new Repository

```php
$designRepository = new \MyPromo\Connect\SDK\Repositories\Designs\DesignRepository($client);
```

#### Available Methods

###### Create Design

Create a new editor user hash (with [Design][Design])

```php
$design = new \MyPromo\Connect\SDK\Models\Designs\Design();
...
$designRepository->createEditorUserHash($design);
```

Create a new design (with [Design][Design])

```php
$design = new \MyPromo\Connect\SDK\Models\Designs\Design();
...
$designRepository->create($design);
```

###### Submit Design

Submit a design.

```php
$designRepository->submit($design->getId());
```

###### Preview Design

Get a design preview.

```php
$designRepository->getPreviewPDF($design->getId());
```

Get a design preview and save it in a file.

```php
$designRepository->savePreview($design->getId(), 'preview.pdf');
```

[Design]: ../../Models/Designs/Design.md

