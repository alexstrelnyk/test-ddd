<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'validator.builder' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/validator/Validation.php';

$this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

$instance->setConstraintValidatorFactory(($this->privates['validator.validator_factory'] ?? $this->load('getValidator_ValidatorFactoryService.php')));
$instance->setTranslationDomain('validators');
$instance->enableAnnotationMapping(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
$instance->addMethodMapping('loadValidatorMetadata');
$instance->addObjectInitializers([0 => ($this->privates['doctrine.orm.validator_initializer'] ?? $this->load('getDoctrine_Orm_ValidatorInitializerService.php'))]);

return $instance;
