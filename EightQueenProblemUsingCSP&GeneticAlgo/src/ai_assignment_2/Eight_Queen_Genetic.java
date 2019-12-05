/*
Submitted By: 

Murtaza Multan 16K-3618
Abdul Mannan   16K-3620

8 queen solving using genetic algorithm
*/
package ai_assignment_2;

import java.util.Arrays;
import java.util.Random;

public class Eight_Queen_Genetic {

public static int calcFitness(int pop[]){
        //calculating the fitness of specified population

        //by default fitness of a population is 28, we will decrement the number of non attacking pairs
        int p=0, fit = 28;
        String board[][] = { 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    }; 
         
        
        //Arranging Board according to population
        for(int i=0;i<8;i++)
        {
            //whatever pop[] is subtract from 8 to get index
            if((8-(pop[i])>=0))
                board[8-(pop[i])][i]="Q";
        }
        
        //removing conflicts
        for(int i=0;i<8;i++)
        {
            //conflicts of ith (each) queen according to the population
            fit-=removeConflicts(board,(8-(pop[i])),i);
        }
        
        //System.out.println("Fitness:    "+fit);
        return fit;
    }
    
public static int removeConflicts(String board[][],int row,int col){
        //finds the number of attacking queens
        int Attacks=0;
        int i=0,j=1;
     
        /*right*/
        for (i = col+1; i < 8; i++)
            if (board[row][i].contains("Q"))
                    Attacks++;

         /*upper right diagnol*/
         j=1;
        for (i = row-1; i >=0; i--)
            if((col+j)<8)
            {    
                if (board[i][col+(j)].contains("Q"))
                    Attacks++;
                j++;
            }
        
        /*lower right diagnol*/
        j=1;
        for (i = row+1; i <8; i++) 
            if((col+j)<8)
            {
                if (board[i][col+(j)].contains("Q")){
                    Attacks++; 
                }
                j++;
            }
     return Attacks;
 }   
 
 public static void printBoard(int chromosome[]) { 
     String board[][] = { 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    { "0", "0", "0", "0","0", "0", "0", "0"  }, 
                    }; 
         
        
        //Arranging Board according to population
        for(int i=0;i<8;i++)
        {
            //whatever pop[] is subtract from 8 to get index
            if((8-(chromosome[i])>=0))
                board[8-(chromosome[i])][i]="Q";
        }
     System.out.println("************************************************************");
    for (int i = 0; i < 8; i++) { 
        for (int j = 0; j < 8; j++) 
            System.out.print(" " + board[i][j] + "\t"); 
       System.out.println(); 
    } 
    System.out.println("************************************************************\n");
}

 public static void crossOver(int arr[], int arr2[]){//performs the crossover
     int crossoverPoint=2;
		
     int temp[]=new int[arr.length];
     temp=Arrays.copyOf(arr,arr.length);
     
     int temp2[]=new int[arr2.length];
     temp2=Arrays.copyOf(arr2,arr2.length);
     
     for(int i=crossoverPoint+1;i<8;i++){
         arr[i]=temp2[i];
         arr2[i]=temp[i];
     }
 }
 
 public static void mutation(int pop[]){//mutates the first repetition found
   int i=0;
     for ( i= 0; i < 8; i++){ 
         for (int j = i + 1 ; j < 8; j++){ 
             if (pop[i]==pop[j]) 
             { 
                 if((pop[j]+1)==9){
                     pop[j]=1;
                     return;
                 }
                 pop[j] = pop[j]+1;
                 return;
             }
         }
     }
 }
 
 public static void printChrosome(int pop[]){//prints the population
     for(int i=0;i<pop.length;i++){
         System.out.print(","+pop[i]);
     }
     System.out.println("");
 }
 
 public static void printPopulation(int chromosome1[],int chromosome2[],int chromosome3[],int chromosome4[]){//prints the population
        printChrosome(chromosome1);
        printChrosome(chromosome2);
        printChrosome(chromosome3);
        printChrosome(chromosome4);
 }

public static int Find_Least_Fit_Chromosome(int[] arr) 
    { 
        int minimum=arr[0];
        int minimumIndex=0;
        
        for(int i=0;i<arr.length;i++)
        {
            if(arr[i]<minimum)
            {
                minimum=arr[i];
                minimumIndex=i;
            }
        }
        return minimumIndex;
    }  
public static void RandomChromosomeGenerator(int chromosome[]){
    Random rand = new Random();
    int v=0;
    for(int i=0;i<8;i++){
        v=rand.nextInt(9);
        if(v==0){
            chromosome[i]=1;
            continue;
        }
        chromosome[i]=v;
    }
}  

/* Testing Chromosomes
  static int[] chromosome1={2,4,7,4,8,5,5,2};//24
  static int[] chromosome2={3,2,7,5,2,4,1,1};//23
  static int[] chromosome3= {2,4,4,1,5,1,2,4};//20
  static int[] chromosome4= {3,2,5,4,3,2,1,3};//11     
//   static int chromosome1[]={8,4,1,3,6,2,7,5};//28
  */

  static int[] chromosome1 = new int[8];
  static int[] chromosome2 = new int[8];
  static int[] chromosome3 = new int[8];
  static int[] chromosome4 = new int[8];  
  
  public static void Eight_Queen_Genetic_Algorithm(){
  
  //comment these to test on testing chromosomes
  
  RandomChromosomeGenerator(chromosome1);
  RandomChromosomeGenerator(chromosome2);
  RandomChromosomeGenerator(chromosome3);
  RandomChromosomeGenerator(chromosome4);
  
  int i=1;
      
        while(true){
                System.out.println("\nIteration: "+(i++));
                int fitness[]= new int[4];
                if((calcFitness(chromosome1)==28)||(calcFitness(chromosome2)==28)||(calcFitness(chromosome3)==28)||(calcFitness(chromosome4)==28)||(calcFitness(chromosome1)==calcFitness(chromosome2)&&calcFitness(chromosome1)==calcFitness(chromosome3)&&calcFitness(chromosome1)==calcFitness(chromosome4))||i==25){
                    System.out.println("\n\n**************Final Ans**************");
                    System.out.println("Chromosome1:"+calcFitness(chromosome1)+"\nChromosome2:"+calcFitness(chromosome2)+"\nChromosome3:"+calcFitness(chromosome3)+"\nChromosome4:"+calcFitness(chromosome4));
                    printPopulation(chromosome1,chromosome2,chromosome3,chromosome4);
                    System.out.println("************************************");
                    printBoard(chromosome1);
                    break;
                } 

                System.out.println("**********************************************************************************************\n\n");
                System.out.println("Chromosome1:"+calcFitness(chromosome1)+"\nChromosome2:"+calcFitness(chromosome2)+"\nChromosome3:"+calcFitness(chromosome3)+"\nChromosome4:"+calcFitness(chromosome4));

                System.out.println("Initial Population");  
                printPopulation(chromosome1,chromosome2,chromosome3,chromosome4);

                //selection on the basis of fitness function
                fitness[0]=calcFitness(chromosome1);
                fitness[1]=calcFitness(chromosome2);
                fitness[2]=calcFitness(chromosome3);
                fitness[3]=calcFitness(chromosome4);


                int RemoveLeastFitChromosome= Find_Least_Fit_Chromosome(fitness);

                int a[]= new int[8];

                switch(RemoveLeastFitChromosome)
                {
                    case 0:
                        a=chromosome2;
                        for(int m=0;m<8;m++)
                            chromosome1[m]=a[m];
                        break;

                    case 1:
                        a=chromosome3;
                        for(int m=0;m<8;m++)
                            chromosome2[m]=a[m];
                        break;
                    case 2:
                         a=chromosome2;
                        for(int m=0;m<8;m++)
                            chromosome3[m]=a[m];
                        break;

                    case 3:
                     a=chromosome2;
                        for(int m=0;m<8;m++)
                            chromosome4[m]=a[m];
                        break;  

                    default:
                }

                System.out.println("\nAfter Selection");
                printPopulation(chromosome1,chromosome2,chromosome3,chromosome4);  

                //Performing Crossover
                crossOver(chromosome1,chromosome2);
                crossOver(chromosome3, chromosome4);

                System.out.println("\nAfter CrossOver");
                printPopulation(chromosome1,chromosome2,chromosome3,chromosome4);

                //Performing Mutation
                mutation(chromosome2);
                
                System.out.println("\nAfter Mutation");
                printPopulation(chromosome1,chromosome2,chromosome3,chromosome4);

        }
  }
  
    public static void main(String[] args) {
        Eight_Queen_Genetic_Algorithm();
    }
}