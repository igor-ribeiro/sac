<div class="modal fade js-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chamado #<span class="js-field" data-field="chamado.numero"></span></h4>
      </div>
      <div class="modal-body">
        <ul>
            <div class="row">
                <div class="col-md-6">
                    <h4>Cliente</h4>
                    <li>
                        <strong>Nome: </strong>
                        <span class="js-field" data-field="cliente.nome"></span>
                    </li>
                    <li>
                        <strong>E-mail: </strong>
                        <span class="js-field" data-field="cliente.email"></span>
                    </li>
                </div>

                <div class="col-md-6">
                    <h4>Pedido</h4>
                    <li>
                        <strong>Número: </strong>
                        <span class="js-field" data-field="pedido.numero"></span>
                    </li>
                    <li>
                        <strong>Descrição: </strong>
                        <span class="js-field" data-field="pedido.descricao"></span>
                    </li>
                </div>
            </div>
        </ul>
        <hr>
        <ul>
            <h4>Chamado</h4>
            <li>
                <strong>Título: </strong>
                <span class="js-field" data-field="chamado.titulo"></span>
            </li>
            <li>
                <strong>Número: </strong>
                <span class="js-field" data-field="chamado.numero"></span>
            </li>
            <li>
                <strong>Observação: </strong><br>
                <span class="js-field" data-field="chamado.observacao"></span>
            </li>
        </ul>
      </div>
    </div>
  </div>
</div>
