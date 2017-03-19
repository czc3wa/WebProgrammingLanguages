package examples;

import java.io.*;
import java.net.*;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

class QuestionObject {
	private int row;
	private int column;
	private int value;
	private String QA;
	public QuestionObject() {
		row = 0;
		column = 0;
		value = 0;
		QA = "";
	}
	public int getRow() {
		return row;
	}
	public void setRow(int row) {
		this.row = row;
	}
	public int getColumn() {
		return column;
	}
	public void setColumn(int column) {
		this.column = column;
	}
	public int getValue() {
		return value;
	}
	public void setValue(int value) {
		this.value = value;
	}
	public String getQA() {
		return QA;
	}
	public void setQA(String qA) {
		QA = qA;
	}
	
	
}

@WebServlet("/InterpretQuestions")
public class InterpretQuestions extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private int i = 0;
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		i = 0;

		out.println("<!doctype html>");
		out.println("	<html>");
		out.println("		<head>");
		out.println("			<title>Assignment 4</title>");
		out.println("			<h1 style=\" text-align: center\">Braden Wright & Corey Chen</h1>");
		out.println("			<style type=\"text/css\"> ");
		out.println("				body {");
		out.println("					background-color: #99ccff;");
		out.println("				}");
		out.println("			</style>");
		out.println("		</head>");
		out.println("		<body>");
	    out.println("           <form action=\"InterpretQuestions\" method=\"post\">");
	    out.println("           <table border = \"1\" cellSpacing=5 cellPadding=5 border=5 bgColor=\"lavender\">");		
	    
		URL qData = new URL("http://plato.cs.virginia.edu/~czc3wa/cs4640/assignment4/questionData.txt");
        BufferedReader in = new BufferedReader(new InputStreamReader(qData.openStream()));

		String inputLine = in.readLine();
        while ((inputLine != null)) {
        	//this is where we want to interpret things
        	if (inputLine.startsWith("Question: ")) {
        		out.println("		<tr>");
        		out.println("			<td>" + inputLine + "<br/>" + "Answer(s): ");
        		//htmlOut+="<tr><td>" + inputLine + "<br/>" + "Answer(s): ";
        		inputLine = in.readLine();
        		while (inputLine != null && !inputLine.startsWith("Question: ")) {
        			if (inputLine.startsWith("Answer: ")) {
        				String cleanAns = inputLine.substring(8);
        				inputLine = in.readLine();
        				if ( inputLine != null && inputLine.startsWith("Question: ")){
        					out.println(cleanAns);
        				} else {
        					out.println(cleanAns + ", ");
        				}
                	} else if (inputLine.startsWith("Correct Answer: ")) {
                		String cleanAns = inputLine.substring(16);
                		out.println(cleanAns);
                		inputLine = in.readLine();
                	} else {
                		inputLine = in.readLine();
                	}
        		}
				out.println("			</td>");
				out.println("			<td>Row:<input type=\"number\" name=\"row"+i+"\"></td>");
				out.println("			<td>Column:<input type=\"number\" name=\"column"+i+"\"></td>");
				out.println("			<td>Value:<input type=\"number\" name=\"value"+i+"\"></td>");
				out.println("		</tr>");
			}
			i++;
		}
        in.close();
        out.println("			</table>");	      
        out.println("			<div style=\"text-align:center;\">");
        out.println("				<input style=\"font-weight:bold;fontsize:35px;background-color:lightgreen;text-align:center\" class=\"button1\" type=\"button\" onclick=\"location.href='http://plato.cs.virginia.edu/~czc3wa/cs4640/assignment4/assignment3.php';\" value=\"Add more Q/A\" />");
  	    out.println("               <input style=\"font-weight:bold;fontsize:35px;background-color:lightgreen;text-align:center\" class=\"button2\" type=\"submit\" name=\"Submit\" value=\"submit\" title=\"Submit\" /> ");    
        out.println("			</div>");
        out.println("           </form>");
        out.println("		</body>");
		out.println("	</html>");



	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out = response.getWriter();
		ArrayList<QuestionObject> tempQObjs = new ArrayList<QuestionObject>();

		URL qData = new URL("http://plato.cs.virginia.edu/~btw3ta/main_project/questionData.txt");
		BufferedReader in = new BufferedReader(new InputStreamReader(qData.openStream()));
		
		int j = 0;
		int mr = 0;
		int mc = 0;
		String fileOut = "";
		
		String inputLine = in.readLine();
		while (j < i) {
			QuestionObject qo = new QuestionObject();
			String thisQA = "";
			if (inputLine.startsWith("Question: ")) {
				fileOut+=inputLine;
				thisQA+=inputLine;
				inputLine = in.readLine();
				while (inputLine!=null && !inputLine.startsWith("Question: ")) {
					String cleanAns = inputLine;
					if (inputLine.startsWith("Answer: ")) {
						cleanAns = inputLine.substring(8);
					} else if (inputLine.startsWith("Correct Answer: ")) {
						cleanAns = inputLine.substring(16);
					}
					fileOut+=","+cleanAns;
					thisQA+=","+cleanAns;
					inputLine = in.readLine();
				}
			}
			qo.setQA(thisQA);
			String row = request.getParameter("row"+j);
			qo.setRow(Integer.parseInt(row));
			String column = request.getParameter("column"+j);
			qo.setColumn(Integer.parseInt(column));
			String value = request.getParameter("value"+j);
			qo.setValue(Integer.parseInt(value));
			fileOut+=row+","+column+","+value+"||";
			tempQObjs.add(qo);
			j++;
		}
		File file = new File("/Applications/apache-tomcat/webapps/cs4640/WEB-INF/data/setupData.txt");
		FileWriter saveData = new FileWriter(file);
		saveData.append(fileOut);
		saveData.close();
		out.println("<!doctype html>");
		out.println("	<html>");
		out.println("		<head>");
		out.println("			 <h1 style=\" text-align: center\">Jeopardy</h1>");
		out.println("			 <style type=\"text/css\"> ");
		out.println("			  	html, body {");
		out.println("			    height: 100%;");
		out.println("				}");
		out.println("");
		out.println("				html {");
		out.println("				    display: table;");
		out.println("				    margin: auto;");
		out.println("				}");
		out.println("");
		out.println("				body {");
		out.println("					background-color: #99ccff;");
		out.println("				    display: table-cell;");
		out.println("				    vertical-align: middle;");
		out.println("				}");
		out.println("			</style>");
		out.println("			<title>Assignment 4: Game Page</title>");
		out.println("		</head>");
		out.println("		<body>");
		//Here is where we generate the table
		/*for (int a = 0; a < mr; a++) {
			for (int b = 0; b < mc; b++) {
				
			}
		}*/
		for (int i = 0; i < tempQObjs.size() - 1; i++)
        {
            int index = i;
            for (int r = i + 1; r < tempQObjs.size(); r++)
                if (tempQObjs.get(r).getRow() < tempQObjs.get(index).getRow())
                    index = r;
      
            QuestionObject smallerNumber = tempQObjs.get(index); 
            tempQObjs.set(index,tempQObjs.get(i));
            tempQObjs.set(i, smallerNumber);
        }
		 int cr = tempQObjs.get(0).getRow();
	       int priorX = 0;
	       for (int x = 0; x < tempQObjs.size(); x++) {
	               if (tempQObjs.get(x).getRow() != cr) {
	                       cr = tempQObjs.get(x).getRow();
	                       //sort! (from priorX to x
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~	                       
	                       for (int i = priorX; i < x; i++)
	                       {
	                           int index = i;
	                           for (int r = i + 1; r < x; r++)
	                               if (tempQObjs.get(r).getColumn() < tempQObjs.get(index).getColumn()) {
	                                   index = r;
	                               }
	                           QuestionObject smallerNumber = tempQObjs.get(index); 
	                           tempQObjs.set(index,tempQObjs.get(i));
	                           tempQObjs.set(i, smallerNumber);
	                       }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~	                       
	                       
	                       priorX = x;
	               }
	       }

	    int maxRow = tempQObjs.get(tempQObjs.size()-1).getRow();
	    int maxColumn = 0;
	       for (int w = 0; w < tempQObjs.size(); w++) {
	               if (tempQObjs.get(w).getColumn() > maxColumn) {
	                       maxColumn = tempQObjs.get(w).getColumn();
	               }
	       }
	    int currObjIndex = 0;
	    out.println("<table border=\"1\" style=\"background-color: #1C189E; color: #CCB73F\">");
	    for(int r = 1; r <= maxRow; r++){
	    	out.println("<tr>");
	    	for(int c = 1; c <= maxColumn; c++) {
	    		int row = tempQObjs.get(currObjIndex).getRow();
	    		int column = tempQObjs.get(currObjIndex).getColumn();
	    		int value = tempQObjs.get(currObjIndex).getValue();
	    		if(row == r && column == c) {
	    			out.println("<td style=\" text-align: center\">");
	    			out.println(value);
	    			out.println("</td>");
	    			if (currObjIndex < tempQObjs.size()-1 ) {
	    				currObjIndex++;
	    			}
	    		}
	    		else {
	    			out.println("<td style=\" text-align: center\">");
	    			out.println("No Question");
	    			out.println("</td>");
	    		}
	    	}
	    	out.println("</tr>");
	    }
	    out.println("</table>");
	    
	

//		int a = 0;
//		while (a < tempQObjs.size()) {
//			out.println(tempQObjs.get(a).getRow()+","+tempQObjs.get(a).getColumn()+","+tempQObjs.get(a).getValue());
//			a++;
//		}
		/*out.println("			The largest row # provided was: "+mr);
		out.println("			And the largest column was: "+mc);*/
		out.println("		</body>");
		out.println("	</html>");
	}

}

