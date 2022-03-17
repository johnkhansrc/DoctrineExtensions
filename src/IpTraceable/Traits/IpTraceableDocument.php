<?php

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\IpTraceable\Traits;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Types\Type;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * IpTraceable Trait, usable with PHP >= 5.4
 *
 * @author Pierre-Charles Bertineau <pc.bertineau@alterphp.com>
 */
trait IpTraceableDocument
{
    /**
     * @var string
     * @Gedmo\IpTraceable(on="create")
     * @ODM\Field(type="string")
     * @Groups({
     *     "gedmo.doctrine_extentions.trait.ip_traceable_document",
     *     "gedmo.doctrine_extentions.trait.ip_traceable",
     *     "gedmo.doctrine_extentions.traits",
     * })
     */
    #[ODM\Field(type: Type::STRING)]
    #[Gedmo\IpTraceable(on: 'create')]
    #[Groups(["gedmo.doctrine_extentions.trait.ip_traceable_document", "gedmo.doctrine_extentions.trait.ip_traceable", "gedmo.doctrine_extentions.traits"])]
    protected $createdFromIp;

    /**
     * @var string
     * @Gedmo\IpTraceable(on="update")
     * @ODM\Field(type="string")
     * @Groups({
     *     "gedmo.doctrine_extentions.trait.ip_traceable_document",
     *     "gedmo.doctrine_extentions.trait.ip_traceable",
     *     "gedmo.doctrine_extentions.traits",
     * })
     */
    #[ODM\Field(type: Type::STRING)]
    #[Gedmo\IpTraceable(on: 'update')]
    #[Groups(["gedmo.doctrine_extentions.trait.ip_traceable_document", "gedmo.doctrine_extentions.trait.ip_traceable", "gedmo.doctrine_extentions.traits"])]
    protected $updatedFromIp;

    /**
     * Sets createdFromIp.
     *
     * @param string $createdFromIp
     *
     * @return $this
     */
    public function setCreatedFromIp($createdFromIp)
    {
        $this->createdFromIp = $createdFromIp;

        return $this;
    }

    /**
     * Returns createdFromIp.
     *
     * @return string
     */
    public function getCreatedFromIp()
    {
        return $this->createdFromIp;
    }

    /**
     * Sets updatedFromIp.
     *
     * @param string $updatedFromIp
     *
     * @return $this
     */
    public function setUpdatedFromIp($updatedFromIp)
    {
        $this->updatedFromIp = $updatedFromIp;

        return $this;
    }

    /**
     * Returns updatedFromIp.
     *
     * @return string
     */
    public function getUpdatedFromIp()
    {
        return $this->updatedFromIp;
    }
}
