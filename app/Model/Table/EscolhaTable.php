<?php
namespace App\Model\Table;

use App\Model\Entity\Escolha;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escolha Model
 *
 */
class EscolhaTable extends Table
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

        $this->table('escolha');
        $this->displayField('IDescolha');
        $this->primaryKey('IDescolha');

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
            ->add('IDescolha', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDescolha', 'create');

        $validator
            ->add('IDfuncionario', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDfuncionario', 'create')
            ->notEmpty('IDfuncionario');

        $validator
            ->add('IDopcao', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDopcao', 'create')
            ->notEmpty('IDopcao');

        return $validator;
    }
}
