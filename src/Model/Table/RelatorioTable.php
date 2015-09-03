<?php
namespace App\Model\Table;

use App\Model\Entity\Relatorio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Relatorio Model
 *
 */
class RelatorioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('relatorio');
        $this->displayField('IDrelatorio');
        $this->primaryKey('IDrelatorio');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('IDrelatorio', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDrelatorio', 'create');

        $validator
            ->add('IDfuncionario', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDfuncionario', 'create')
            ->notEmpty('IDfuncionario');

        $validator
            ->requirePresence('avaliacao', 'create')
            ->notEmpty('avaliacao');

        return $validator;
    }
}
