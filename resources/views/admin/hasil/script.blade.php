<script>
    $(document).ready(function(e) {
        var table = $('#dataTable').DataTable({
            ajax: {
                url: "{{ route('admin.hasil.index') }}",
                dataType: 'json',
                type: 'get',
            },
        });


        $(document).on('click', '.btn-detail', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                dataType: 'json',
                type: 'get',
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        const {
                            result,
                            result: {
                                hasil_combine,
                                metode
                            },
                            result: {
                                gejala: {
                                    hasil_detail
                                }
                            }
                        } = data;

                        let output = ``;
                        let no = 1;
                        hasil_detail.map((v, i) => {

                            output += `
                            <tr>
                                <td>${no++}</td>    
                                <td>${v.gejala.kode_gejala}</td>    
                                <td>${v.gejala.nama_gejala}</td>    
                                <td>${v.bobot_user.bobot_user} | ${v.bobot_user.nilai_bobot_user}</td>    
                                <td>${v.gejala.cfpakar_gejala}</td>    
                            </tr>
                            `;
                        })

                        no = 1;
                        let output1 = ``;
                        output1 = `
                            <thead>
                                <tr>
                                    <th>No.</th>    
                                    <th>CF[H,E]</th>    
                                    <th>Hasil</th>    
                                </tr>
                            </thead>
                            <tbody>`
                        metode.step1.map((v, i) => {
                            output1 += `
                            <tr>
                                <td>${no}</td>    
                                <td>CF[H,E]${no}</td>
                                <td>${number_format(v,3)}</td>
                            </tr>
                            `;

                            no++;
                        })
                        output1 += `
                            </tbody>
                        `;
                        $('#tableStep1').html(output1);

                        no = 1;
                        let output2 = ``;
                        output2 = `
                            <thead>
                                <tr>
                                    <th>No.</th>    
                                    <th>CF Combine[H,E]</th>    
                                    <th>Hasil</th>    
                                </tr>
                            </thead>
                            <tbody>`
                        metode.step2.map((v, i) => {
                            output2 += `
                            <tr>
                                <td>${no}</td>    
                                <td>CF Combine[H,E]${no}</td>
                                <td>${number_format(v,3)}</td>
                            </tr>
                            `;
                            no++;
                        })
                        output2 += `
                            </tbody>
                        `;
                        $('#tableStep2').html(output2);

                        $('#presentaseHasil').html(`
                        <hr />
                         <div class="table-responsive">
                             <table class="w-100">
                                 <tr class="bg-success">
                                     <th class="p-3">
                                         <h4 class="text-white">Hasil Presentase</h4>
                                     </th>
                                     <th>
                                         <h4 class="text-white">:</h4>
                                     </th>
                                     <th>
                                         <h4 class="text-white">${number_format((hasil_combine * 100), 2)}</h4>
                                     </th>
                                 </tr>
                             </table>
                         </div>

                        `);
                        $('#loadDataGejala').html(output);
                        $('#modalDetail').modal('show');
                    }
                },
                error: function(xhr) {
                    const {
                        responseText
                    } = xhr;
                    if (responseText != null) {
                        console.log(responseText);
                    }

                }
            })
        })

        // initialize manually with a list of links
        $(document).on('click', '[data-gallery="photoviewer"]', function(e) {
            e.preventDefault();
            var items = [],
                options = {
                    index: $('.photoviewer').index(this),
                };

            $('[data-gallery="photoviewer"]').each(function() {
                items.push({
                    src: $(this).attr('href'),
                    title: $(this).attr('data-title')
                });
            });

            new PhotoViewer(items, options);
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const action = $(this).closest("form").attr('action');
            Swal.fire({
                title: 'Deleted',
                text: "Yakin ingin menghapus item ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        dataType: 'json',
                        type: 'post',
                        method: 'DELETE',
                        success: function(data) {
                            if (data.status == 200) {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                );
                                table.ajax.reload();

                            } else {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'error'
                                )
                            }

                        },
                        error: function(x, t, m) {
                            console.log(x.responseText);
                        }
                    })
                }
            })
        })

        function number_format(number, decimals, dec_point, thousands_sep) {
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                toFixedFix = function(n, prec) {
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    var k = Math.pow(10, prec);
                    return Math.round(n * k) / k;
                },
                s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    })
</script>
