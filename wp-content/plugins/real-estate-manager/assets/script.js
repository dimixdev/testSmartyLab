
jQuery( document ).ready(function() {
	if(!jQuery('.real-estate-manager '))return false;
	const rem = new RealEstateManager;
    jQuery('.real-estate-manager .erm-but-search').click(()=>{
		rem.Search();
	});
});


class RealEstateManager{

	constructor(){
		this.pageSize = 3;
		this.template = wp.template('erm-list-item');
		this.list = jQuery('.real-estate-manager .erm-post-list');
		this.Search();
	}

	Search(){

		let t = this;

		let houseName = jQuery('.input-house_name').val();
		let locationCoordinates = jQuery('.input-location_coordinates').val();
		let numberOfFloors = jQuery('.select-number_of_floors').val();
		let typeOfStructure = jQuery('.radio-type_of_structure:checked').val();

		jQuery.ajax({
			url:my_ajax_obj.ajax_url,
			type:'POST',
			dataType: 'json',
			data:{
				action: 'ajax_rem_search',
				house_name: houseName,
				location_coordinates: locationCoordinates,
				number_of_floors: numberOfFloors,
				type_of_structure: typeOfStructure
			},
			success: function(res) {
				if(!res)return false;
				t.Show(res,1);
				t.Pagination(res);
				
			}
		});
	}

	Show(res,page){
		let t = this;
	    let num = res.length;
		let startIndex = (page - 1) * this.pageSize;
        let endIndex = startIndex + this.pageSize;
        let itemsToShow = res.slice(startIndex, endIndex);


        this.list.html('');
        itemsToShow.forEach(function(data) {
            t.list.append(t.template(data));
        });
	}

	Pagination(res){
		let t = this;
		let num = res.length;
	    let totalPages = Math.ceil(num / this.pageSize);
	    jQuery('.erm-pagination').empty();

	    for (let i = 1; i <= totalPages; i++) {
	        let button = '<button class="page-btn" data-page="' + i + '">' + i + '</button>';
	        jQuery('.real-estate-manager  .erm-pagination').append(button);
	    }

	    jQuery('.page-btn').on('click', function() {
	        let page = parseInt(jQuery(this).attr('data-page'));
	        t.Show(res,page);
	    });
	}
}
