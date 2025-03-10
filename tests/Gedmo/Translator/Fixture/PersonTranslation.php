<?php

declare(strict_types=1);

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Tests\Translator\Fixture;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translator\Entity\Translation;

/**
 * @ORM\Table(
 *         indexes={@ORM\Index(name="translations_lookup_idx", columns={
 *             "locale", "translatable_id"
 *         })},
 *         uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_idx", columns={
 *             "locale", "translatable_id", "property"
 *         })}
 * )
 * @ORM\Entity
 */
#[ORM\Entity]
#[ORM\Index(name: 'translations_lookup_idx', columns: ['locale', 'translatable_id'])]
#[ORM\UniqueConstraint(name: 'lookup_unique_idx', columns: ['locale', 'translatable_id', 'property'])]
class PersonTranslation extends Translation
{
    /**
     * @var Person|null
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="translations")
     */
    #[ORM\ManyToOne(targetEntity: Person::class, inversedBy: 'translations')]
    protected $translatable;
}
