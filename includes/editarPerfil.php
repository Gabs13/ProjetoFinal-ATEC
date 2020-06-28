<script src="javascript/scriptseditperfil.js"></script>
<body>
  <div class="editarPerfil_body">
    <div class="editarPerfil_back"></div>
    <div class="editarPerfil_body_display">
      <form>
        <div class="editarPerfil_body_display_text">Editar Perfil</div>
        <div class="editarPerfil_body_display_container" id="body_container">
          <div class="editarPerfil_body_display_info">Primeiro Nome</div>
          <div class="editarPerfil_body_display_output" id="lb_pnome"></div>
          <div class="editarPerfil_body_display_edit" id="1">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full ppp" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Nome:</div>
          <input type="text" id="tb_pnome" placeholder="Rúben">
          <div class="editar_perfil_edicao_buttons">
            <button type="button">Confirmar</button>
            <button type="button" id="btnCancelar" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container">
          <div class="editarPerfil_body_display_info">Ultimo Nome</div>
          <div class="editarPerfil_body_display_output" id="lb_unome"></div>
          <div class="editarPerfil_body_display_edit" id="2">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Ultimo Nome:</div>
          <input type="text" id="tb_unome" placeholder="do Tuning">
          <div class="editar_perfil_edicao_buttons">
            <button type="button">Confirmar</button>
            <button type="button" id="btnCancelar" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container"  id="body_container">
          <div class="editarPerfil_body_display_info">Descrição</div>
          <div class="editarPerfil_body_display_output" id="lb_desc"></div>
          <div class="editarPerfil_body_display_edit" id="7">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full"  style="display:none;">
          <div class="editar_perfil_edicao_nome">Nova Descrição:</div>
          <input type="text" id="tb_desc">
          <div class="editar_perfil_edicao_buttons">
            <button type="button">Confirmar</button>
            <button type="button" id="btnCancelar" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container">
          <div class="editarPerfil_body_display_info">Telemovel</div>
          <div class="editarPerfil_body_display_output" id="lb_tlmv"></div>
          <div class="editarPerfil_body_display_edit" id="3">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Telemovel:</div>
          <input type="text" id="tb_tlmv" placeholder="939284801">
          <div class="editar_perfil_edicao_buttons">
            <button type="button">Confirmar</button>
            <button type="button" id="btnCancelar" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container">
          <div class="editarPerfil_body_display_info">Genero</div>
          <div class="editarPerfil_body_display_output" id="lb_genero"></div>
          <div class="editarPerfil_body_display_edit" id="4">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Genero:</div>
          <input type="text" placeholder="Masculino">
          <div class="editar_perfil_edicao_buttons">
            <button type="button">Confirmar</button>
            <button type="button" id="btnCancelar" class="btnCancelar" onclick="carregarInfoEdit();">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_last"></div>
      </form>
    </div>
  </div>

</body>
