@extends('test.template')
@section('conten-body')

<div class="row">
	 <div class='col-sm-8'>    </div>	
        <div class='col-sm-4'>
		<label for="daterange" >PILIH WAKTU</label> 
			<input type="text" name="daterange" value="01/01/2016 - 01/31/2016" />
        </div>	
<br></br>		
    </div>
<div class="row" id="tampilanPrint">
    <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="img/pln.jpg" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   OxyRed  Technologies  LLC.</strong>
              <br />
                  <i>Address :</i> 245/908 , New York Lane,
              <br />
                  Forth Street , Deumark,
              <br />
                  United States.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  info@yourdomain.com 
             </span>
             <span>
                 <strong>Call : </strong>  +95 - 890- 789- 9087 
             </span>
              <span>
                 <strong>Fax : </strong>  +012340-908- 890 
             </span>
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong>Client Information</strong></h4>
           <strong>  Jhon Deo Chuixae</strong>
             <br />
                  <b>Address :</b> 145/908 , New York Lane,
              <br />
                 United States.
             <br />
             <b>Call :</b> +90-908-567-0987
              <br />
             <b>E-mail :</b> info@clientdomain.com
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <h4>  <strong>Payment Details </strong></h4>
            <b>Bill Amount :  990 USD </b>
              <br />
               Bill Date :  01th August 2014
              <br />
               <b>Payment Status :  Paid </b>
               <br />
               Delivery Date :  10th August 2014
              <br />
               Purchase Date :  30th July 2014
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Perticulars</th>
                                    <th>Quantity.</th>
                                    <th>Unit Price</th>
                                     <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Website Design</td>
                                    <td>1</td>
                                    <td>300 USD</td>
                                    <td>300 USD</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Plugin Dev.</td>
                                    <td>2</td>
                                    <td>200 USD</td>
                                    <td>400 USD</td>
                                </tr>
                                <tr>
                                     <td>3</td>
                                    <td>Hosting Domains</td>
                                    <td>2</td>
                                    <td>100 USD</td>
                                    <td>200 USD</td>
                                </tr>
                                
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Amount : 900 USD </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : 990 USD</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.

                 </li>
                 <li>
                     Please read all terms and polices on  www.yourdomaon.com for returns, replacement and other issues.

                 </li>
             </ol>
             </div>
         </div>
		    <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a class="print btn btn-primary btn-lg" >cetak mode 1</a>
            
              <a href="{{ url('/cetakbilling') }}" class="btn btn-success btn-lg" >cetak mode 2</a>

             </div>
         </div>
		   </div>
@stop

@section('scripts') 

<script type="text/javascript" src="{{ asset('js/html2canvas.js') }}"></script>	


<!-- Include Date Range Picker -->
<script type="text/javascript">
$(document).ready(function(){
   	$('.print').on('click', function(){		
		  html2canvas($("#tampilanPrint"), {
	        onrendered: function(canvas) {
			/*var canvasRatio = canvas.height / canvas.width;
				var windowRatio = window.innerHeight / window.innerWidth;
				var width;
				var height;
				
				
				canvas.style.width = width +1000+ 'px';
				canvas.style.height = height+2000 + 'px';
				*/
	        	$("#page").hide();
			//	canvas
			//	document.body.appendChild(canvas);
		
	            window.print();
	           $('canvas').remove();
	            $("#page").show();
	        }
	    });
	    
	});
	});
	</script>

	@stop