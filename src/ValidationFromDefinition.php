<?php

declare(strict_types=1);

namespace Peak\ArrayValidation;

class ValidationFromDefinition extends Validation
{
    /**
     * @var ValidationDefinition
     */
    private $validationDefinition;

    /**
     * ValidationFromDefinition constructor.
     * @param ValidationDefinition $validationDefinition
     * @param array $data
     * @param string|null $dataName
     * @param Validator|null $arrayValidation
     */
    public function __construct(
        ValidationDefinition $validationDefinition,
        array $data,
        string $dataName = null,
        Validator $arrayValidation = null
    ) {
        $this->validationDefinition = $validationDefinition;
        parent::__construct($data, $dataName, $arrayValidation);

        (new ValidationDefinitionExecutor())->execute(
            $validationDefinition,
            $this
        );
    }
}
