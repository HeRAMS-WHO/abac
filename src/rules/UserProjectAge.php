<?php


namespace prime\auth\rules;


use SamIT\abac\interfaces\Authorizable;
use SamIT\abac\Manager;
use SamIT\abac\interfaces\Rule;

/**
 * Class UserProjectAge
 * This is an example rule.
 * @package prime\auth\rules
 */
abstract class UserProjectAge implements Rule
{



    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return "your age is > 18.";
    }

    /**
     * @param Authorizable $source
     * @param Authorizable $target
     * @return boolean
     */
    public function execute(Authorizable $source, Authorizable $target, \ArrayAccess $environment, Manager $manager)
    {
        return ($source instanceof User)
            && ($target instanceof Project)
            && $source->getAuthAttributes()['age'] > 18;
    }

    /**
     * @return string[] An array of class names that this rule applies to.
     */
    public function getTargetTypes()
    {
        return [Project::class];
    }

    /**
     * @return string The name of the permission that this rule grants.
     */
    public function getPermissionName()
    {
        return Manager::PERMISSION_READ;
    }
}