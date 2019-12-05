
package pkgboolean;

import java.io.FileWriter;
import java.util.*;
import java.io.IOException;
import java.nio.file.*;
import java.text.DecimalFormat;


public class Boolean {
    public static int corpusSize=0;//give the corpus size, query is also taken as a document
    
    public static DecimalFormat dForm = new DecimalFormat("###.#####");//how much decimal places you want
    //Read File(Short Story)
    public static String readFileAsString(String fileName) throws IOException
    { 
      String data = ""; 
      data = new String(Files.readAllBytes(Paths.get(fileName))); 
      return data; 
    } 
    //Tokenize
    public static String[] getTokens(String str){
        String rejectors="[ \\r?\\n\'\";.,?!-]+";
        //String[] words2=data.split("\\s");//splits the string based on whitespace  
        String[] words2=str.split(rejectors);
        return words2;
    }
    //Display Tokens
    public static void displayContent(String str[]){
        /*Print contents of file*/
         for(String w:str)  {
                System.out.println(w);}
    }
    
    public static void displayDic(Map<String,LinkedList<Integer>> dic){
        
       for(String w: dic.keySet()){
           System.out.println("\n"+w+":   "+dic.get(w));
       }
       
    }
    
    public static void displayTf(Map<String,double[]> tf){
        double a[];
        //for every term, print the values
       for(String w: tf.keySet()){
           System.out.print("\n"+w+":\t\t");
           a=tf.get(w);
           for(double i:a)System.out.print(i+",\t");
       }
       
    }
    
    public static void insertDf(Map<String,LinkedList<Integer>> dic,Map<String,double[]> tf){
        double a[];
       for(String w: tf.keySet()){
           a=tf.get(w);
           a[0]=getDf(dic,w);//df is stored in first column of the table
           tf.put(w, a);
       }
       
    }
    
    public static void SearchSingleTerm(Map<String,LinkedList<Integer>> dic){
        System.out.print("Enter Term:  ");
        Scanner scanner = new Scanner(System. in); 
        String  query = scanner. nextLine();

            String key = query.toLowerCase();

            if(!dic.containsKey(key)){System.out.println("Term Not Found");return;}
            System.out.println(key+" ("+dic.get(key).size()+") "+":"+dic.get(key));
    }
    
    public static int getDf(Map<String,LinkedList<Integer>> dic, String query){  
               String key =  query.toLowerCase();//change here
            if(!dic.containsKey(key)){System.out.println("Term Not Found");return 0;}
            if(dic.get(key).contains(corpusSize)){return dic.get(key).size()-1; }
            return dic.get(key).size();
    }
    
    public static double[] getTf(Map<String,double[]> tf, String query){ 
            double b[] = {0};
               String key =  query.toLowerCase();
            if(tf.containsKey(key)){return tf.get(key);}
            System.out.println("TermNotFound");
            return b;
    }
    
    public static void calcIdf(Map<String,double[]> tf){  
            int  s=0, N= corpusSize-1;double df=0;//excluding the query
            System.out.println("");
            double idf=0, ndf=0;
       for(String w: tf.keySet()){
           idf=0;ndf=0;df=0;
           double[] a=tf.get(w);
           s=tf.get(w).length;
           df=a[0];
           if(df==0){
               idf=0;
               a[s/2]=idf;//index of IDF
                tf.put(w, a);
                continue;
           }
           ndf=N/df;
           
//           idf = Math.log10(ndf);
           
           idf=Double.parseDouble(dForm.format(Math.log10(ndf))); 
           
            // idf = log(N/df)
            
            a[s/2]=idf;//index of IDF
            
           tf.put(w, a);
       }
    }
    
    public static void calcTfIdf(Map<String,double[]> tf, double vector[][]){  
            int  s=0, N= corpusSize-1;double df=0;//excluding the query
            System.out.println("");
            double idf=0, ndf=0;
            int j=1, it=0, j2=0;           
            for(String w: tf.keySet()){
                idf=0;df=0;
                double[]  a=tf.get(w);
                s=tf.get(w).length;
                 // idf = log(N/df)

                idf=a[s/2];//s/2 == index of IDF
                
                // tf*idf
                for(int i=1;i<(s/2);i++){
                    
//                    a[(s/2)+(j++)]=a[i]*a[s/2];//vector values
                    a[(s/2)+(j++)]=Double.parseDouble(dForm.format(a[i]*a[s/2]));
                    //put a[i]*a[s/2] in vector arrray*************
                    
                    vector[i-1][j2] = Double.parseDouble(dForm.format(a[i]*a[s/2]));
                    
                    //********************************************
                }
                j=1;//keeping track of columns of table
                j2++;//terms of a vector
                tf.put(w, a);//modifying rows of table

            }
            
    }
    
    public static void Indexing(Map<String,LinkedList<Integer>> dic, Map<String,double[]> tf) throws IOException{
    
        int docId=0;
        //Convert contents of file to a string 
        for(int i=0;i<corpusSize;i++){//specify path to short stories directories
         
        /*
            Comment the collection which you dont want to use, change the corpusSize accordingly
            sir collection corpusSize==51
            my collections col1 and col2 corpusSize==4
            */    
        /*My Collection col1
        d1 dil dil Pakistan, jan jan Pakistan
        d2 Pakistan hum sub ki jan
        d3 dil aur jan Pakistan Pakistan
        q dil jan Pakistan
        */
//        String data=readFileAsString("col1\\"+(i+1)+".txt");
        
        /*My Collection col2
        d1 w1 w2 w4 w6
        d2 w1 w2 w7 w3
        d3 w8 w5 w4 w5 w6
        q  w2 w5 w6
*/
//        String data=readFileAsString("col2\\"+(i+1)+".txt");

        //Sir Collection
            String data=readFileAsString("col3\\"+(i+1)+".txt");

    docId=i+1;
            /*Retrieving Tokens*/
            String[] words2=getTokens(data);

            //Sorting tokens in alphabetical order
            Arrays.sort(words2);

            /*Indexing of tokens*/

              List<String> STOPWORDS = Arrays.asList("a","is","the","of","all","and","to"
                                                    ,"can","be","as","once","for","at","am"
                                                    ,"are","has","have","had","up","his","her"
                                                    ,"in","on","no","we","do",
                                                    //filtering alphabets only
                                                    "b","c","d","e","f","g","h"
                                                    ,"i","j","k","l","m","n","o","p","q","r","s","t"
                                                    ,"u","v","w","x","y","z");

            for (String w : words2) {
                //before indexing word, check whether its a stopword or not
                if(!STOPWORDS.contains(w.toLowerCase())){//filtering stopwords
                    //indexing
                    String key = w.toLowerCase();//key here change

                    if (dic.containsKey(key)){//if key already in map
                        
                       
                        LinkedList<Integer> postings = new LinkedList<>();//append the postings if docId is new else ignore
                        postings=dic.get(key);
                        
                        double a[]=tf.get(key);//tf logic
                        
                        if(postings.contains(docId)){
                            //increase tf here
                            
                            a[docId]=++a[docId];
                            tf.put(key, a);
                            //tf logic
                            continue;
                        }
                        postings.addLast(docId);
                        dic.put(key,postings);
                        
                        //tf logic
                        a[docId]=++a[docId];
                        tf.put(key, a);
                        //tf logic
                    }

                    else{
                        
                       
                        LinkedList<Integer> postings = new LinkedList<>();//if key not present then put it in map
                        postings.addLast(docId);
                        dic.put(key, postings);    
                        //increase tf here
                        double a[] = new double[(corpusSize*2+1)+1];//columns for df, idf are also included
                        for(int j=0;j<=(corpusSize*2+1);j++){a[j]=0;}
//                        a[0]=getDf(dic,key);
                        a[docId] = ++a[docId];
                        tf.put(key,a);
                        
                        //tf logic
                    }

                }
        }
              
        
        }
    }
    
    public static void displayVectors(double vector[][], int totTerms){
        for(int i=0;i<corpusSize;i++){
            System.out.println("Vector:   "+(i+1));
            for(int j=0;j<totTerms;j++){
                System.out.print(vector[i][j]+" ");
            }    
            System.out.println("");
        }
    }
    
    public static void calcDotProd(double vector[][], int totTerms, double sum[]){
        double summ=0;
        for(int i=0;i<corpusSize-1;i++){//excluding the query
      for(int j=0;j<totTerms;j++){
            //dot product = docVector(vector[i][j]) * queryVector(vector[corpusSize-1][j])
            summ+=Double.parseDouble(dForm.format(vector[i][j]*vector[corpusSize-1][j]));
      }
      sum[i]=summ;//sum == dot product of doc with query
      summ=0;
  }
    }
    
    public static void calcMagnitude(double vector[][], int totTerms, double mag[]){
        double summ=0;
        for(int i=0;i<corpusSize;i++){//excluding the query
      for(int j=0;j<totTerms;j++){
            summ+=Double.parseDouble(dForm.format(vector[i][j]*vector[i][j]));//square
      }
      
      mag[i]=Double.parseDouble(dForm.format(Math.sqrt(summ)));//sum == magnitude of doc, storing it in magnitude array
      summ=0;
  }
    }
    
    public static void calcSim(double sum[], double mag[]){
        
        TreeMap<Double, Integer> sorted = new TreeMap<>(Collections.reverseOrder()); //for descending order, because rank is from highest to lowest
  
        for(int i=0;i<corpusSize-1;i++){//excluding the query doc
            double b = Double.parseDouble(dForm.format((mag[i]*mag[corpusSize-1])));
            sorted.put(Double.parseDouble(dForm.format(sum[i]/b)),i+1);//calculating similarity
        }
        
        System.out.println("\n***********Ranking Of Documents:***********");
        
         for(Double w: sorted.keySet()){
            if(w<0.005){continue;}
           System.out.println("\n D-"+sorted.get(w)+" Sim: "+w);
       }
    }
    
    /**
     * @param args the command line arguments
     */
    
    public static void main(String[] args) throws IOException {
        Scanner sc = new Scanner(System. in);
    while(true){
                System.out.print("Enter Query:    ");

                //uncomment the collection which you wanna use for checking the code
                // 1)col1
//                FileWriter fw=new FileWriter("col1\\4.txt");
//                corpusSize=4;
                
                // 2)col2
//                FileWriter fw=new FileWriter("col2\\4.txt");
//                corpusSize=4;
                
                // 3)col3
                FileWriter fw=new FileWriter("col3\\51.txt");
                corpusSize=51;

                fw.write(sc. nextLine()); 
                fw.close();   

                //hashmap
                TreeMap<String, double[]> sorted = new TreeMap<>();//for sorting the dictionary

                Map<String,LinkedList<Integer>> dic = new HashMap<>();//inverted index

                Map<String,double[]> tf = new HashMap<>();//VSM table

                Indexing(dic,tf);

                sorted.putAll(tf);//sort the table

                insertDf(dic,sorted);//insert df into table
                //now we have term, its df, and tf of all the docs

                calcIdf(sorted);//calculate idf

                System.out.println("");

                //values declaration
                int totTerms = sorted.values().size();      
                double vector [][] = new double[corpusSize][totTerms];//vector TF-IDF
                double sum[] = new double[corpusSize-1];//dot products of docs
                double mag[] = new double[corpusSize];//magnitudes of docs and query

                calcTfIdf(sorted, vector);//calucalte tf-idf

                System.out.println("");
        //        displayTf(sorted);//display table
                System.out.println("");


        //     displayVectors(vector, totTerms);//displays all the vectors

                calcDotProd(vector,totTerms,sum);//calculate dot prodcut of vectors with query

                calcMagnitude(vector,totTerms,mag);//calculate magnitude of all the vectors and query


                calcSim(sum,mag);//calculate similarity between doc and query pair and displays the ranking of documents
                System.out.println("********************************************************************\n\n\n\n");

        }    
        
   
}
}