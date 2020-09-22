         <!-- Modal-->
         <div class="modal fade text-xs-left" id="ModalEditUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title" id="myModalLabel17">Editar Usuario</h4>
               </div>
               <div class="modal-body">
                 <div id="mensaje5"></div>
                 <form class="form" id="formUsuarioEditar">
                   <div class="form-body">
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label for="projectinput1">Usuario</label>
                           <input type="text" id="c_user" class="form-control" placeholder="" name="c_user" required>
                           <!--pattern="^[0-9]+" -->
                         </div>
                       </div>
                       <!-- <div class="col-md-6">
                         <div class="form-group">
                           <label for="projectinput2">Contraseña</label>
                           <input type="password" id="c_pass" class="form-control" placeholder="" name="c_pass" required>
                         </div>
                       </div> -->
                     </div>
                   </div>
               </div>
               <div class="modal-footer">
                 <input type="submit" class="btn btn-info" value="Cambiar">
                 <button type="button" id="RegistraHoras" class="btn btn-light" data-dismiss="modal">Salir</button>
               </div>
               </form>
             </div>
           </div>
         </div>
         <!-- Modal Sizes end -->