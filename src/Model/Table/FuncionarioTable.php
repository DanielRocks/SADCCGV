<?php
namespace App\Model\Table;

use App\Model\Entity\Funcionario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionario Model
 *
 */
class FuncionarioTable extends Table
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

        $this->table('funcionario');
        $this->displayField('IDfuncionario');
        $this->primaryKey('IDfuncionario');

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
            ->add('IDfuncionario', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDfuncionario', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

        $validator
            ->add('responsavel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');

        $validator
            ->requirePresence('departamento', 'create')
            ->notEmpty('departamento');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['login']));
        return $rules;
    }
}
