<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CepDistanciaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CepDistanciaTable Test Case
 */
class CepDistanciaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CepDistanciaTable
     */
    protected $CepDistancia;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CepDistancia',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CepDistancia') ? [] : ['className' => CepDistanciaTable::class];
        $this->CepDistancia = $this->getTableLocator()->get('CepDistancia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CepDistancia);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CepDistanciaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
