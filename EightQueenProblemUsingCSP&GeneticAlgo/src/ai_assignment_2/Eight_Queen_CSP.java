package ai_assignment_2;
//kch bol to sahi
/*
Submitted By: 

Murtaza Multan 16K-3618
Abdul Mannan   16K-3620

8 queen solving using CSP

*/
import static java.lang.System.exit;

public class Eight_Queen_CSP {

    /**
     * @param args the command line arguments
     * 
     * 
    */
    
 public static boolean CheckQueen(String board[][], int col)//Checks for the queen in the column
{
    if(col>=1){
        for(int i=0;i<8;i++){
            if(board[i][col].equals("Q"))
                return true;
        }
        return false;
    }
    return true;
}   
       
public static void printSolution(String board[][]) 
{ 
    System.out.println("************************************************************");
    for (int i = 0; i < 8; i++) { 
        for (int j = 0; j < 8; j++) 
            System.out.print(" " + board[i][j] + "\t"); 
       System.out.println(); 
    } 
    System.out.println("************************************************************\n");
}
    
public static void RemoveAttackingPosition(String board[][], int position, int col)
{
    int i=0,j=1;
    //called when a queen is moved from its place
        /* UP */
        for (i = position-1; i >= 0; i--) 
            if (board[i][col].equals("X"+col))  
                board[i][col] = "0";

        /* Down */
        for (i = position+1; i < 8; i++) 
            if (board[i][col].equals("X"+col))
                board[i][col] = "0";

        /* left */
        for (i = col-1; i >= 0; i--) 
        {   
            if (board[position][i].equals("X"+col)) 
            {    
                board[position][i] = "0";
            }
        }
        
        /*right*/
        for (i = col+1; i < 8; i++)

            if (board[position][i].equals("X"+col))
                    board[position][i] = "0";

        /*upper left diagnol*/

        for (i = position-1; i >= 0; i--) 
            if((col-j)>=0)
            {
                if (board[i][col-(j)].equals("X"+col)){
                    board[i][col-(j)] = "0";     
                }
                j++;
            }

         /*upper right diagnol*/
         j=1;
        for (i = position-1; i >=0; i--)
            if((col+j)<8)
            {    
                if (board[i][col+(j)].equals("X"+col))
                {
                    board[i][col+(j)] = "0";
                    
                }
                j++;
            }

        /*lower left diagnol*/
        j=1;
        for (i = position+1; i <8; i++) 
            if((col-j)>=0)
            {
                if (board[i][col-(j)].equals("X"+col)){
                        board[i][col-(j)] = "0";
                        
                }
                j++;
            }
        /*lower right diagnol*/
        j=1;
        for (i = position+1; i <8; i++) 
            if((col+j)<8)
            {
                if (board[i][col+(j)].equals("X"+col)){
                    board[i][col+(j)] = "0";                    
                }
                j++;
            }
        
        System.out.println("After RemoveAttackingPosition");
        printSolution(board);
    
}


public static void Backtracking(String board[][], int col)
{
    //Find Eight_Queen_CSP
    //Remove attacking positions
    //put queen
    
    int position=0;
    
    for(int i=0;i<8;i++) //Find Eight_Queen_CSP
    {
        if(board[i][col].equals("Q"))
        {
            board[i][col]="0"; //reset position
            position=i;  
            break;            
        }
    }
    
    RemoveAttackingPosition(board,position,col); //Remove attacking positions of that queen
    
    System.out.println("After Removing Attacking Position of col: "+col+" from Position(Row): "+position);
    
    printSolution(board);
    
    boolean available=false;
    
    //Checking Avalaibility in the column
    
    for(int i=(position+1) ;i<8;i++)    
    {
        
        if( board[i][col].equals("0") )
        {
            board[i][col]="Q";
            FillAttackingPosition(board, i, col);
            available=true;
            break;
        }
        i++;
        available=false;
    }
   
    System.out.println("backtracking col: "+ col);
//    printSolution(board);
    
     if(position==8 && !CheckQueen(board, col+1)) //if there is no place to put the queen i.e we have reached the last row
     {
        System.out.println("position==8 && !CheckQueen(board, col+1)");
           Backtracking(board, col-1);
           colIterator=col-1;
      }
    
    if(!available)          //if a column doesnt contain a queen
        if((col-1)>=0)  
        {    
            System.out.println("position:" +position);
                Backtracking(board, col-1);
                colIterator=col-1;
        }
    
}        
  
public static void FillAttackingPosition(String board[][], int row, int col)
{
   
   int i=0,j=1;
 
        /* UP */
        for (i = row-1; i >= 0; i--) 
            if (board[i][col] != "Q" && !board[i][col].contains("X")) 
                board[i][col] = ("X"+col);

        /* Down */
        for (i = row+1; i < 8; i++) 
            if (board[i][col] != "Q" && !board[i][col].contains("X"))
                board[i][col] = ("X"+col);

        /* left */
        for (i = col-1; i >= 0; i--) 
        {   
            if (board[row][i] != "Q" && !board[row][i].contains("X")) 
            {    
                board[row][i] = ("X"+col);
            }
        }
        /*right*/
        for (i = col+1; i < 8; i++)

            if (board[row][i] != "Q" && !board[row][i].contains("X"))
                    board[row][i] = ("X"+col);

        /*upper left diagnol*/

        for (i = row-1; i >= 0; i--) 
            if((col-j)>=0)
            {
                if (board[i][col-(j)] != "Q" && !board[i][col-(j)].contains("X")){
                    board[i][col-(j)] = ("X"+col);     
                }
                j++;
            }

         /*upper right diagnol*/
         j=1;
        for (i = row-1; i >=0; i--)
            if((col+j)<8)
            {    
                if (board[i][col+(j)] != "Q" && !board[i][col+(j)].contains("X"))
                {
                    board[i][col+(j)] = ("X"+col);
                    
                }
                j++;
            }

        /*lower left diagnol*/
        j=1;
        for (i = row+1; i <8; i++) 
            if((col-j)>=0)
            {
                if (board[i][col-(j)] != "Q" && !board[i][col-(j)].contains("X")){
                        board[i][col-(j)] = ("X"+col);
                        
                }
                j++;
            }
        /*lower right diagnol*/
        j=1;
        for (i = row+1; i <8; i++) 
            if((col+j)<8)
            {
                if (board[i][col+(j)] != "Q" && !board[i][col+(j)].contains("X")){
                    board[i][col+(j)] = ("X"+col);
                    
                }
                j++;
            }
}
    
public static void removeX(String board[][]){
    for(int i=0;i<8;i++){
        for(int j=0;j<8;j++){
                if(board[i][j].contains("X")){
                    board[i][j]="*";
                }
        }
    }
}

public static void EightQueenUsingCSP(){
    
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
 
int row=0;
        
        boolean available=false;
        while(colIterator<8)
        {
            for( row=0;row<8;row++)
            {
                if(!CheckQueen(board, (colIterator-1)))//checking queen in previous column
                {
                    colIterator=colIterator-1;
                }
                else
                {
                     if(!board[row][colIterator].contains("X"))
                      {
                          board[row][colIterator]="Q";
                          available=true;
                          break;
                      }
                      available=false;
                }
            }
            
            System.out.println("col: "+colIterator +" Availble: "+available);
            if(!available)//backtracking because no place available in column
            {
                System.out.println("col#: " +colIterator); 
                Backtracking(board, colIterator-1);
           
            }
            
            if(row!=8)
                FillAttackingPosition(board,row,colIterator); // the position of queen
   
            printSolution(board);
            colIterator++;
            
        }
        removeX(board);
        printSolution(board);
}
//global variables
    static int colIterator=0;
    
public static void main(String[] args) {
   EightQueenUsingCSP();
}
    
}

