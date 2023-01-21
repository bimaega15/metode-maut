 <!-- Modal -->
 <div class="modal fade" id="modalDetail" aria-labelledby="modalDetailLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalDetailLabel">Form Detail</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <strong>Konsultasi user</strong>
                         <div class="table-responsive">
                             <table class="table table-bordered" style="width: 100%;">
                                 <thead>
                                     <tr>
                                         <th>No.</th>
                                         <th>Kode gejala</th>
                                         <th>Nama gejala</th>
                                         <th>CF User</th>
                                         <th>CF Pakar</th>
                                     </tr>
                                 </thead>
                                 <tbody id="loadDataGejala">
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="col-lg-6">
                         <h6 class="text-center">Step 1</h6>
                         <div class="table-responsive">
                             <table class="table table-bordered" id="tableStep1">
                             </table>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <h6 class="text-center">Step 2</h6>
                         <div class="table-responsive">
                             <table class="table table-bordered" id="tableStep2">
                             </table>
                         </div>
                     </div>
                     <div id="presentaseHasil">

                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="check"></i>
                     OK
                 </button>
             </div>
         </div>
     </div>
 </div>
