/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package pd_muhammadrizkyperdana_kasirrestoran;

/**
 *
 * @author PC06
 */

import java.util.Scanner;
public class PD_MuhammadRizkyPerdana_KasirRestoran {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner input = new Scanner(System.in);
        
        String[] nama_petugas = new String[100];
        
        String[] menu_makanan = {
            "Tidak Memilih Makanan",
            "Bakso", 
            "Mie Ayam", 
            "Capcay", 
            "Sate Ayam", 
            "Seblak"};
        String[] menu_minuman = {
            "Tidak Memilih Minuman",
            "Air Putih", 
            "Es Teh", 
            "Teh Anget", 
            "Nutrisari"};
        
        int[] pilih_menu_makanan = new int[10];
        int[] pilih_menu_minuman = new int[10];
        
        int[] harga_makanan = {
            0,
            15000, 
            15000, 
            12000, 
            17000, 
            12000};
        int[] harga_minuman = {
            0,
            3000, 
            5000, 
            5000, 
            5000};
        
        int[] pilih_harga_makanan = new int[10];
        int[] pilih_harga_minuman = new int[10];
        
        int[] banyak_makanan = new int[100];
        int[] banyak_minuman = new int[100];
        
        int[] uang_bayar = new int[100];
        int[] uang_kembali = new int[100];
        
        int total_belanja;
        int[] total = new int[100];
        
//        int[] total_belanja = new int [100];
        
        System.out.println("Transaksi Kasir Restoran");
        
        System.out.println("Daftar Menu :");
        System.out.println("- Makanan :");
        for (int i = 1; i < 6; i++) {
            System.out.println((i) + "." + menu_makanan[i] + " : Rp." + harga_makanan[i]);
        }
        
        System.out.println("========================================");
        
         System.out.println("- Minuman :");
        for (int i = 1; i < 5; i++) {
            System.out.println((i) + "." + menu_minuman[i] + " : Rp." + harga_minuman[i]);
        }
        
        System.out.println("========================================");
        
        System.out.println("");
        System.out.println("");
        System.out.println("Masukkan Banyak Transaksi Yang Ingin Dilakukan :");
//        
//        int banyak_transaksi = Integer.parseInt(banyak));
        int banyak_transaksi;
        banyak_transaksi = input.nextInt();
        input.nextLine();
        
        for (int i = 0; i < banyak_transaksi ; i++) {
            System.out.println("Masukkan Nama Petugas :");
            nama_petugas[i] = input.nextLine();
            
            System.out.println("Masukkan Makanan Yang Dipilih (Number):");
            pilih_menu_makanan[i] = input.nextInt();
            input.nextLine();
            
            System.out.println("Masukkan Banyak Makanan Yang Dipesan (Number):");
            banyak_makanan[i] = input.nextInt();
            input.nextLine();
            
            System.out.println("Masukkan Minuman Yang Dipilih (Number) :");
            pilih_menu_minuman[i] = input.nextInt();
            input.nextLine();
            
            System.out.println("Masukkan Banyak Minuman Yang Dipesan (Number):");
            banyak_minuman[i] = input.nextInt();
            input.nextLine();
            
            pilih_harga_makanan[i] = pilih_menu_makanan[i];
            pilih_harga_minuman[i] = pilih_menu_minuman[i];
            
            int[] total_harga_makanan = new int[100];
            int[] total_harga_minuman = new int[100];
            total_harga_makanan[i] = harga_makanan[pilih_harga_makanan[i]] * banyak_makanan[i];
            total_harga_minuman[i] = harga_minuman[pilih_harga_minuman[i]] * banyak_minuman[i];
            
            total_belanja = total_harga_makanan[i] + total_harga_minuman[i];
            
            total[i] = total_belanja;
            
            System.out.println("");
            System.out.println("Total Harga: " + total_belanja );
            
            System.out.println("Masukkan Uang Bayar (Number) :");
            uang_bayar[i] = input.nextInt();
            input.nextLine();
            
        }
        
        System.out.println("");
        System.out.println("");
        System.out.println("========================================");
        System.out.println("Struk Transaksi Kasir Restoran");
        System.out.println("Transaksi Ke " + banyak_transaksi);
        for (int i = 0; i < banyak_transaksi ; i++) {
            System.out.println("-----------------------------------");
            System.out.println("Nama Petugas :");
            System.out.println(nama_petugas[i]);
            
            System.out.println("Makanan yang Dipesan :");
            System.out.println(menu_makanan[pilih_menu_makanan[i]]);
            
            System.out.println("Minuman Yang Dipesan :");
            System.out.println(menu_minuman[pilih_menu_minuman[i]]);
            
            System.out.println("-----------------------------------");
            
            System.out.println("Total Bayar Pesanan :");
            System.out.println("Rp." + total[i]);
            
            System.out.println("Nominal Pembayaran :");
            System.out.println("Rp." + uang_bayar[i]);
            
            uang_kembali[i] = uang_bayar[i] - total[i];
            System.out.println("Nominal Kembalian :");
            System.out.println("Rp." + uang_kembali[i]);
            
            if (total[i] > 50000) {
                System.out.println("*Bonus mendapatkan 1 makanan bebas pilih");
            } else if (total[i] >=25000 && total[i] <= 50000) {
                System.out.println("*Bonus mendapatkan 1 minuman bebas pilih");
            } else {
                
            }
            
            System.out.println("-----------------------------------");
            System.out.println("");
                    
        }
        
    }
    
}
