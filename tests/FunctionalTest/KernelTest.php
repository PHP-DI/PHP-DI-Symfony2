<?php
/**
 * PHP-DI
 *
 * @link      http://php-di.org/
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace DI\Bridge\Symfony\Test\FunctionalTest;

use DI\Bridge\Symfony\SymfonyContainerBridge;
use DI\Bridge\Symfony\Test\FunctionalTest\Fixtures\Class1;
use DI\Bridge\Symfony\Test\FunctionalTest\Fixtures\Class2;

/**
 * @coversNothing
 */
class KernelTest extends AbstractFunctionalTest
{
    public function testKernelShouldBoot()
    {
        $kernel = $this->createKernel();

        $this::assertInstanceOf(SymfonyContainerBridge::class, $kernel->getContainer());
    }

    public function testPhpdiShouldResolveClasses()
    {
        $kernel = $this->createKernel();

        $object = $kernel->getContainer()->get(Class1::class);
        $this::assertInstanceOf(Class1::class, $object);
    }

    public function testSymfonyShouldResolveClasses()
    {
        $kernel = $this->createKernel('class2.yml');

        $object = $kernel->getContainer()->get('class2');
        $this::assertInstanceOf(Class2::class, $object);
    }
}
