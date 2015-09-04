<?php
namespace App\Model\Table;

use App\Model\Entity\Opcao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Opcao Model
 *
 */
class OpcaoTable extends Table
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

        $this->table('opcao');
        $this->displayField('IDopcao');
        $this->primaryKey('IDopcao');

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
            ->add('IDopcao', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('IDopcao', 'create');

        $validator
            ->add('IDpergunta', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IDpergunta', 'create')
            ->notEmpty('IDpergunta');

        $validator
            ->requirePresence('opcao', 'create')
            ->notEmpty('opcao');

        return $validator;
    }
}
