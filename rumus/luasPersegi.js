
// function hitung() {


//     let count = panjang* lebar;

//     document.getElementById("hasil").value = count;
// }

document.getElementById("hitung").addEventListener("click",function(){
        let sisi = document.getElementById("panjang").value;

      let hasil = sisi * sisi;

    document.getElementById('hasil').value = hasil;

});

// count = () =>{
//     // mengambil nilai dari elemen (get value)
//       let panjang = document.getElementById('panjang').value;
//       let lebar = document.getElementById('lebar').value;
//       let hasil = panjang * lebar;
      
//       // menentukan nilai pada elemen (set value)
//       document.getElementById('hasil').value = hasil;
//     }
