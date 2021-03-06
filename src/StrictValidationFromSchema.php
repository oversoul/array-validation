<?php

declare(strict_types=1);

namespace Peak\ArrayValidation;

class StrictValidationFromSchema extends StrictValidation
{
    /**
     * StrictValidationFromSchema constructor.
     * @param SchemaInterface $schema
     * @param array $data
     * @param Validator|null $arrayValidation
     * @throws Exception\InvalidStructureException
     * @throws Exception\InvalidTypeException
     */
    public function __construct(
        SchemaInterface $schema,
        array $data,
        Validator $arrayValidation = null
    ) {
        parent::__construct($data, $schema->getName(), $arrayValidation);

        $validationDefinition = $schema->compile();

        (new ValidationDefinitionExecutor())->execute(
            $validationDefinition,
            $this
        );
    }
}
