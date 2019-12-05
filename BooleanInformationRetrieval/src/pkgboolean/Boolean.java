
package pkgboolean;

import java.util.Arrays;
import java.util.List;
import java.io.IOException;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.nio.file.*;;
import java.util.HashMap;
import java.util.Map;
import java.util.LinkedList;
import java.util.Scanner;
public class Boolean {

    //Read File
    public static String readFileAsString(String fileName) throws IOException
    { 
      String data = ""; 
      data = new String(Files.readAllBytes(Paths.get(fileName))); 
      return data; 
    } 
    public static String[] getTokens(String str){
        String rejectors="[ \\r?\\n\'\";.,?!-]+";
        //String[] words2=data.split("\\s");//splits the string based on whitespace  
        String[] words2=str.split(rejectors);
        return words2;
    }
    public static void displayContent(String str[]){
        /*Print contents of file*/
        int j=0;
         for(String w:str)  {
                System.out.println(w+": "+(j+1));j++;}
    }
    public static void displayTokens(String str) throws IOException{
        /*Print contents of file*/
        //Convert contents of file to a string 
        String data = readFileAsString(str);
        System.out.println(""+data);
       
    }
    public static void writeToFile(String str[],int doc) throws IOException{
        
          BufferedWriter writer = new BufferedWriter(new FileWriter(
                "C:\\Users\\manan\\Google Drive\\Sem-6\\IR\\Ass\\index\\"+doc+".txt"));
int j=0;
        // Loop over the elements in the string array and write each line.
        for (String w : str) {
            //before writing word to file, check whether its a stopword or not
                writer.write(w.toLowerCase()+": "+(j+1));//writing in lowercase
                j++;//tracking position of term
                writer.newLine();
            
        }
        writer.close();//close file
    }
    public static void search(String str[]){
        /*Searching for the query*/
        System.out.println("");
        String query = "breakfast";        String query2 = "love";

        for(String w:str){
            if(w.equals(query)){
                System.out.print(query+"Present\n");
            }
        }
        for(String w:str){
            if(w.equals(query2)){
                System.out.print(query2+"Present\n");
            }
        }
    }
    public static LinkedList<Integer> intersect(LinkedList<Integer> p1,LinkedList<Integer> p2){
        LinkedList<Integer> ans = new LinkedList();
        int p1p=0, p2p=0;
        while(p1p<p1.size() && p2p<p2.size()){
            if(p1.get(p1p)==p2.get(p2p)){
                ans.add(p1.get(p1p));
                p1p++;p2p++;
            }
            
            
            else if((p1.get(p1p))<(p2.get(p2p))){
                p1p++;
            }
            else p2p++;
        }
        return ans;
    }
    public static void SearchTwo(Map<String,LinkedList<Integer>> dic){
    LinkedList<Integer> p1 = new LinkedList<>();        
        LinkedList<Integer> p2 = new LinkedList<>();
        LinkedList<Integer> ans = new LinkedList<>();   
     
        System.out.print("Enter Term1:    ");
         Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();
        
            int hash = Math.abs(query.hashCode());
            String key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p1 = dic.get(key);
            System.out.print("Enter Term2:    ");
            query = scanner. nextLine();
            hash = Math.abs(query.hashCode());
            key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p2 = dic.get(key);
            ans = intersect(p1,p2);
            System.out.println("("+ans.size()+") :"+ans);
    }
    
    public static void SearchThree(Map<String,LinkedList<Integer>> dic){
        LinkedList<Integer> p1 = new LinkedList<>();        
        LinkedList<Integer> p2 = new LinkedList<>();
        LinkedList<Integer> p3 = new LinkedList<>();

        LinkedList<Integer> ans = new LinkedList<>();   
     
            //Term1
        System.out.print("Enter Term1:    ");
         Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();
            int hash = Math.abs(query.hashCode());
            String key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p1 = dic.get(key);
            
            //Term2
            System.out.print("Enter Term2:    ");
            query = scanner. nextLine();
            hash = Math.abs(query.hashCode());
            key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p2 = dic.get(key);
            
            //Term3
            System.out.print("Enter Term3:    ");
            query = scanner. nextLine();
            hash = Math.abs(query.hashCode());
            key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p3 = dic.get(key);
            
            ans = intersect(p1,p2);
            ans = intersect(ans,p3);
            
            System.out.println("("+ans.size()+") :"+ans);
    }
    
    
    public static void SearchTwoOr(Map<String,LinkedList<Integer>> dic){
    LinkedList<Integer> p1 = new LinkedList<>();        
        LinkedList<Integer> p2 = new LinkedList<>();
        LinkedList<Integer> ans = new LinkedList<>();   
        boolean flag=true;
        
        System.out.print("Enter Term1:    ");
         Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();
        
            int hash = Math.abs(query.hashCode());
            String key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p1 = dic.get(key);
            System.out.print("Enter Term2:    ");
            query = scanner. nextLine();
            hash = Math.abs(query.hashCode());
            key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            p2 = dic.get(key);
            ans = p1;
            for(int i : p2){
                if(!ans.contains(i)){
                    ans.add(i);
                }
            }
            System.out.println("("+ans.size()+") :"+ans);
    }
    public static void SearchSingleTerm(Map<String,LinkedList<Integer>> dic){
        System.out.print("Enter Term:  ");
        Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();
            int hash = Math.abs(query.hashCode());
            String key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            System.out.println(query.toLowerCase()+" ("+dic.get(key).size()+") "+":"+dic.get(key));
    }
    public static void NotTerm(Map<String,LinkedList<Integer>> dic){
        LinkedList<Integer> ans= new LinkedList<>();
        int arr[]=new int[50],j=0;
        System.out.print("Enter Term:  ");
        Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();
            int hash = Math.abs(query.hashCode());
            String key = Integer.toString(hash);
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            ans=dic.get(key);
            for(int i=0;i<50;i++){
                if(!ans.contains(i+1)){
                    arr[j++]=i+1;
                }
            }
            System.out.print("("+j+") : [");
            for(int i=0;i<j;i++){System.out.print(arr[i]+",");}
            System.out.print("]");
    }
    
    public static void Indexing(Map<String,LinkedList<Integer>> dic) throws IOException{
    
        int docId=0;
        //Convert contents of file to a string 
        for(int i=0;i<50;i++){//specify path to short stories directories
//        String data = readFileAsString("C:\\Users\\manan\\Google Drive\\Sem-6\\IR\\Ass\\"+(i+1)+".txt"); 
        String data = readFileAsString((i+1)+".txt"); 
        
docId=i+1;
        /*Retrieving Tokens*/
        String[] words2=getTokens(data);
        
        /*Indexing of tokens*/
        int j=0;//for position
        
          List<String> STOPWORDS = Arrays.asList("a","is","the","of","all","and","to"
                                                ,"can","be","as","once","for","at","am"
                                                ,"are","has","have","had","up","his","her"
                                                ,"in","on","no","we","do",
                                                //filtering alphabets only
                                                "b","c","d","e","f","g","h"
                                                ,"i","j","k","l","m","n","o","p","q","r","s","t"
                                                ,"u","v","w","x","y","z");
          
        for (String w : words2) {
            //before writing word to file, check whether its a stopword or not
            if(!STOPWORDS.contains(w.toLowerCase())){//filtering stopwords
                //indexing
                int hash = Math.abs(w.toLowerCase().hashCode()); //hashes can be negative!! take absolute value
        String key = Integer.toString(hash);//key 
        if (dic.containsKey(key)){//if key already in map
            LinkedList<Integer> postings = new LinkedList<>();//append the postings if docId is new else ignore
            postings=dic.get(key);
            if(postings.contains(docId)){
                continue;
            }
            postings.addLast(docId);
            dic.put(key,postings);
        }
        else{
            LinkedList<Integer> postings = new LinkedList<>();//if key not present then put it in map
            postings.addLast(docId);
            dic.put(key, postings);
        }
                j++;//tracking position of term
//                writer.newLine();
            }
            else j++;//if word is a stopword, skip it
        }
              
        
        /*Displaying tokens before filtering*/
//        displayContent(words2);
 
        /*Searching for query terms*/
//        search(words2); 

         // Create our BufferedWriter.
//       writeToFile(words2,i+1);
       
        /*Displaying tokens after filtering*/
//        displayTokens("C:\\Users\\manan\\Google Drive\\Sem-6\\IR\\Ass\\index\\lol.txt");
        }
    }
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        
        //hashmap
        Map<String,LinkedList<Integer>> dic = new HashMap<>();
        Indexing(dic);
       //Search a single term
        System.out.print("Enter form of query:\n1)Term\n2)Term1 AND Term2\n3)Term1 OR Term2\n4)Term1 AND Term2 AND Term3\n5)NOT Term\n6)0 to exit:    ");

        Scanner scanner = new Scanner(System.in); 
        String  choice = scanner. nextLine();
        boolean flag = true;
        while(flag){
            if(choice.equals("0")){flag=false;continue;}
            if(choice.equals("1")){
                SearchSingleTerm(dic);
            }
            if(choice.equals("2")){
                SearchTwo(dic);
            }
            if(choice.equals("3")){
                SearchTwoOr(dic);
            }
            if(choice.equals("4")){
                SearchThree(dic);
            }
            if(choice.equals("5")){
                NotTerm(dic);
            }
            
            System.out.print("Enter form of query:\n1)Term\n2)Term1 AND Term2\n3)Term1 OR Term2\n4)Term1 AND Term2 AND Term3\n5)NOT Term\n6)0 to exit:    ");
            choice=scanner.nextLine();
        }
}
}