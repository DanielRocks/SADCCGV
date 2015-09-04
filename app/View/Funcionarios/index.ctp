<!-- File: /app/View/Funcionarios/index.ctp -->

<h1>Funcionarios do Blog</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Data de Criação</th>
    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $funcionarios, imprimindo
         as informações dos funcionarios -->

    <?php foreach ($funcionario as $funcionario): ?>
    <tr>
        <td><?php echo $funcionario['Funcionario']['IDfuncionario']; ?></td>
        <td>
            <?php echo $this->Html->link($funcionario['Funcionario']['nome'],
array('controller' => 'funcionarios', 'action' => 'view', $funcionario['Funcionario']['IDfuncionario'])); ?>
        </td>
        <td><?php echo $funcionario['Funcionario']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>