import java.io.*;
import javax.xml.parsers.*;
import org.w3c.dom.*;

class Domex {
    public static void main(String args[]) throws Exception {
        System.out.println("enter employee id (01/02/03/04/05) :");
        String id = new java.util.Scanner(System.in).nextLine();
		
        Document d = DocumentBuilderFactory.newInstance().newDocumentBuilder().parse(new File("Employees.xml"));
		
        Element empdetails = d.getDocumentElement();
        NodeList emps = empdetails.getElementsByTagName("employee");

        for (int i = 0; i < emps.getLength(); i++) {
        
			Element emp = (Element) emps.item(i);
            String eid = emp.getAttribute("id");
            
			if (id.equals(eid)) {
				NodeList nl1 = emp.getElementsByTagName("name");
                Text t1 = (Text) nl1.item(0).getFirstChild();
                System.out.println(t1.getData());
                
				NodeList nl2 = emp.getElementsByTagName("desgn");
                Text t2 = (Text) nl2.item(0).getFirstChild();
                System.out.println(t2.getData());
                
				NodeList nl3 = emp.getElementsByTagName("dept");
                Text t3 = (Text) nl3.item(0).getFirstChild();
                System.out.println(t3.getData());
                
				NodeList nl4 = emp.getElementsByTagName("salary");
                Text t4 = (Text) nl4.item(0).getFirstChild();
                System.out.println(t4.getData());
            }
        }
    }
}