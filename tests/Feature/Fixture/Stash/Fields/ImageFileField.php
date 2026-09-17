<?php

declare(strict_types=1);

namespace Tests\Feature\Fixture\Stash\Fields;

/**
 * @template T
 */
class ImageFileField implements \Aazsamir\Graphpql\Model\ObjectField
{
    private(set) array $fieldVars = [];
    private string $name;
    private \Aazsamir\Graphpql\Model\SelectionSet $child;
    private ?string $union = null;

    /**
     * @return self<mixed>
     */
    public static function id(): self
    {
        $instance = new self();
        $instance->name = 'id';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function path(): self
    {
        $instance = new self();
        $instance->name = 'path';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function basename(): self
    {
        $instance = new self();
        $instance->name = 'basename';

        return $instance;
    }

    /**
     * @deprecated Use parent_folder instead
     * @return self<mixed>
     */
    public static function parent_folder_id(): self
    {
        $instance = new self();
        $instance->name = 'parent_folder_id';

        return $instance;
    }

    /**
     * @deprecated Use zip_file instead
     * @return self<mixed>
     */
    public static function zip_file_id(): self
    {
        $instance = new self();
        $instance->name = 'zip_file_id';

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet>
     */
    public static function parent_folder(): self
    {
        $instance = new self();
        $instance->name = 'parent_folder';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\FolderSelectionSet();

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\BasicFileSelectionSet>
     */
    public static function zip_file(): self
    {
        $instance = new self();
        $instance->name = 'zip_file';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\BasicFileSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function mod_time(): self
    {
        $instance = new self();
        $instance->name = 'mod_time';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function size(): self
    {
        $instance = new self();
        $instance->name = 'size';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function fingerprint(string $type): self
    {
        $instance = new self();
        $instance->name = 'fingerprint';
        $instance->fieldVars['type'] = $type;

        return $instance;
    }

    /**
     * @return self<\Tests\Feature\Fixture\Stash\SelectionSet\FingerprintSelectionSet>
     */
    public static function fingerprints(): self
    {
        $instance = new self();
        $instance->name = 'fingerprints';
        $instance->child = new \Tests\Feature\Fixture\Stash\SelectionSet\FingerprintSelectionSet();

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function format(): self
    {
        $instance = new self();
        $instance->name = 'format';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function width(): self
    {
        $instance = new self();
        $instance->name = 'width';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function height(): self
    {
        $instance = new self();
        $instance->name = 'height';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function created_at(): self
    {
        $instance = new self();
        $instance->name = 'created_at';

        return $instance;
    }

    /**
     * @return self<mixed>
     */
    public static function updated_at(): self
    {
        $instance = new self();
        $instance->name = 'updated_at';

        return $instance;
    }

    /**
     * @param callable(T): void $selection
     */
    public function selector(callable $selection): self
    {
        $selection($this->child);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChild(): ?\Aazsamir\Graphpql\Model\SelectionSet
    {
        if (isset($this->child)) {
            return $this->child;
        }

        return null;
    }

    public function getUnion(): ?string
    {
        return $this->union;
    }
}
