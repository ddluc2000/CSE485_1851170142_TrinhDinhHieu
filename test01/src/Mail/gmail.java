package Mail;

import java.util.Properties;

import javax.mail.Authenticator;
import javax.mail.Folder;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Store;
import javax.mail.internet.InternetAddress;

import org.springframework.web.servlet.ModelAndView;

public class gmail {

	public static ModelAndView getMail() throws MessagingException {

		ModelAndView mav = new ModelAndView("greet");
		mav.addObject("greeting", "GeeksForGeeks Welcomes you to Spring!");

		Properties pro = System.getProperties();
		pro.put("mail.imap.host", "imap.gmail.com");
		pro.put("mail.imap.port", "993");
		pro.put("mail.store.protocol", "imap");
		pro.put("mail.imap.auth", "true");
		pro.put("mail.imap.socketFactory.class", javax.net.ssl.SSLSocketFactory.class.getName());

		Session session = Session.getDefaultInstance(pro, new Authenticator() {
			@Override
			protected PasswordAuthentication getPasswordAuthentication() {
				return new PasswordAuthentication("hieus207@gmail.com", "hieuhieu001");

			}
		});

		Store store = session.getStore();
		store.connect();

		Folder folders = store.getFolder("Inbox");
		Folder folder = folders;
		if (!folder.isOpen()) {
			folder.open(Folder.READ_ONLY);
		}
		System.out.println("#[" + folder.getFullName() + "]");
		Message[] messages = folder.getMessages();
		for (int i = messages.length - 1; i > messages.length - 5; i--) {
			Message msg = messages[i];
			String from = "";
			InternetAddress[] addresses = (InternetAddress[]) msg.getFrom();
			for (InternetAddress add : addresses) {
				from += add.getAddress();
			}

			System.out.println(" + From: " + from);
			System.out.println(" + Subject: " + msg.getSubject());
			System.out.println(" + Sent Date: " + msg.getSentDate());

		}

		return mav;

	}

}
