

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="p-2 bg-dark"></div>
         <div class="bg-dark">
             <h2 class="text-white pb-4 p-0 m-0">Add New product</h2>
         </div>
         <div class="modal-content bg-dark">
             <div class="modal-footer flex-column">
                 <div>
                  <!-- add product form -->
                     <form class="text-white" method="POST" action="products.php" enctype="multipart/form-data">
                         <div class="text-start">
                             <label for="name" class="pe-1"> Product Name</label>
                             <input name="pname" type="text" class="form-control" placeholder="Product Name" id="name" required>
                         </div>
                         <div class="form-group pt-2">
                             <label for="buy" class="pr-10"> Buying Amount</label>
                             <input name="buy" type="text" class="form-control" placeholder="Buying Amount" id="buy" required>
                         </div>
                         <div class="form-group pt-2">
                             <label for="pimage" class="pr-10"> Product Image</label>
                             <input name="pimage" class="pl-20 from-control" type="file" id="pimage" required>
                         </div>
                         <div class="" style="text-align: center;">
                             <button type="submit" value="submit" name="add_product" class="btn btn-success form-control">Add</button>
                         </div>
                     </form>
                 </div>
                 <div class="p-3 text-end w-100">
                     <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                     <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                 </div>
             </div>
         </div>
     </div>
 </div>