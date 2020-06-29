<script src="javascript/scriptseditperfil.js"></script>
<body>
  <div class="editarPerfil_body">
    <div class="editarPerfil_back"></div>
    <div class="editarPerfil_body_display">
      <form>
        <div class="editarPerfil_body_display_text">Editar Perfil</div>
        <div class="editarPerfil_body_display_container" id="body_container1">
          <div class="editarPerfil_body_display_info">Primeiro Nome</div>
          <div class="editarPerfil_body_display_output" id="lb_pnome"></div>
          <div class="editarPerfil_body_display_edit" id="1">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full ppp" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Nome:</div>
          <div class="editar_perfil_input">
            <input type="text" id="tb_pnome" placeholder="Rúben">
          </div>
          <div class="editar_perfil_edicao_buttons">
            <button type="button" onclick="atualizarPNome()">Confirmar</button>
            <button type="button" id="btnCancelar1" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container2">
          <div class="editarPerfil_body_display_info">Ultimo Nome</div>
          <div class="editarPerfil_body_display_output" id="lb_unome"></div>
          <div class="editarPerfil_body_display_edit" id="2">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Ultimo Nome:</div>
          <div class="editar_perfil_input">
            <input type="text" id="tb_unome" placeholder="do Tuning">
          </div>
          <div class="editar_perfil_edicao_buttons">
            <button type="button" onclick="atualizarUNome()">Confirmar</button>
            <button type="button" id="btnCancelar2" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container"  id="body_container3">
          <div class="editarPerfil_body_display_info">Descrição</div>
          <div class="editarPerfil_body_display_output" id="lb_desc"></div>
          <div class="editarPerfil_body_display_edit" id="7">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full"  style="display:none;">
          <div class="editar_perfil_edicao_nome">Nova Descrição:</div>
          <div class="editar_perfil_input">
            <input type="text" id="tb_desc">
          </div>
          <div class="editar_perfil_edicao_buttons">
            <button type="button" onclick="atualizarDesc()">Confirmar</button>
            <button type="button" id="btnCancelar3" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container4">
          <div class="editarPerfil_body_display_info">Telemovel</div>
          <div class="editarPerfil_body_display_output" id="lb_tlmv"></div>
          <div class="editarPerfil_body_display_edit" id="3">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Telemovel:</div>
          <div class="editar_perfil_input">
            <input type="text" id="tb_tlmv" placeholder="939284801">
          </div>
          <div class="editar_perfil_edicao_buttons">
            <button type="button" onclick="atualizarTlmv()">Confirmar</button>
            <button type="button" id="btnCancelar4" class="btnCancelar" onclick="carregarInfoEdit()">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_container" id="body_container5">
          <div class="editarPerfil_body_display_info">Genero</div>
          <div class="editarPerfil_body_display_output" id="lb_genero"></div>
          <div class="editarPerfil_body_display_edit" id="4">Editar</div>
        </div>
        <div class="editarPerfil_body_display_full" id="editarPerfil_body_display_full" style="display:none;">
          <div class="editar_perfil_edicao_nome">Novo Genero:</div>
          <div class="editar_perfil_input">
            <label class="editar_perfil_gen_container">Masculino
              <input id="radio_bt_M" type="radio" name="bt_gen" value="1">
              <span class="checkmark"></span>
            </label>
            <label class="editar_perfil_gen_container">Feminino
              <input id="radio_bt_F" type="radio" name="bt_gen" value="2">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="editar_perfil_edicao_buttons">
            <button type="button" onclick="atualizarGen()">Confirmar</button>
            <button type="button" id="btnCancelar5" class="btnCancelar" onclick="carregarInfoEdit();">Cancelar</button>
          </div>
        </div>
        <div class="editarPerfil_body_display_last"></div>
      </form>
    </div>
  </div>

</body>
